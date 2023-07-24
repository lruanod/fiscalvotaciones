<?php

namespace App\Http\Livewire;



use App\Models\Acta;
use App\Models\Asignacionmesa;
use App\Models\Cierre;
use App\Models\Mesa;
use Illuminate\Support\Facades\Auth;
use App\Models\Partido;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;

class CierreComponent extends Component
{
    use WithFileUploads,WithPagination;
    public $cierre_id,$conteovotos="",$fotoacta=[],$partido_id,$user_id,$modal=0,$buscar,$selecttipo="";
    public $mesa_id, $numeromesa,$votosasignados,$modelo_id, $acta_id,$diferencia=0,$total=0,$identificador,$mensaje="",$randoncierre,$ejemplo;
    protected $listeners =['borrar'];

    public function mount(){
        $this->identificador = rand();
        $this->randoncierre=rand();
       $this->ejemplo= Cierre::join('partidos','partidos.id','cierres.partido_id')->
       join('mesas','mesas.id','cierres.mesa_id')->
       join('centros','centros.id','mesas.centro_id')->
       join('sectors','sectors.id','centros.sector_id')->
       where('partidos.nombrepartido','=','Cabal')->
       where('partidos.tipopartido','=','Alcalde')->
       where('centros.nombrecentro','=','INEB ENTRE RÍOS')->
       where('sectors.nombresector','=','PUERTO BARRIOS')->
       get()->sum('conteovotos');
    }

    public function render()
    {
        return view('livewire.cierre-component',[
            'partidos' => Partido::where('tipopartido','=',$this->selecttipo)->get(),
            'cierres' => $this->getCierresProperty(),
            'mesas' => $this->getMesasProperty(),
        ]);
    }

    public function getCierresProperty(){
        $this->total=0;
        $this->diferencia=0;
        $cierres2=Cierre::join('partidos','partidos.id','=','cierres.partido_id')->where('cierres.acta_id','=',$this->acta_id)->where('partidos.tipopartido','=',$this->selecttipo)->get();
        foreach ($cierres2  as $cierre){
            $this->total=$cierre->conteovotos+$this->total;
        }
        $this->diferencia=$this->total-$this->votosasignados;

        return Cierre::join('partidos','partidos.id','=','cierres.partido_id')->where('cierres.acta_id','=',$this->acta_id)->where('partidos.tipopartido','=',$this->selecttipo)->select('*','cierres.id as cierre_idd')->get();
    }

    public function getMesasProperty(){
        if (!empty($this->buscar) ) {
            return Asignacionmesa::join('mesas','mesas.id','asignacionmesas.mesa_id')->
            join('users','users.id','asignacionmesas.user_id')->
            where('mesas.numeromesa','=',$this->buscar)->
            where('users.id','=',Auth::user()->id)->paginate(10,['*'],'Mesa_pagina');
        } else{
            return Asignacionmesa::join('mesas','mesas.id','asignacionmesas.mesa_id')->
            join('users','users.id','asignacionmesas.user_id')->
            where('users.id','=',Auth::user()->id)->paginate(10,['*'],'Mesa_pagina');
        }

    }

    public function crear($id){
        $this->limpiarCampos();
        $mesa= Mesa::find($id);
        $this->mesa_id=$id;
        $this->numeromesa=$mesa->numeromesa;
        $this->votosasignados=$mesa->votosasignados;

        $this->randoncierre = rand();



        $this->abrirModal();
    }
    public function addacta(){
        $actas=Acta::where('mesa_id','=',$this->mesa_id)->where('tipopartidoacta','=',$this->selecttipo)->get();
        if($actas->isEmpty()){
            $this->modelo_id= Acta::create(
                [
                    'votosasignadosacta'=> $this->votosasignados,
                    'diferencia'=> 0,
                    'total'=> 0,
                    'fotoacta'=> '',
                    'tipopartidoacta'=> '',
                    'mesa_id'=> $this->mesa_id,
                    'user_id'=> Auth::user()->id
                ]);

            $this->acta_id=$this->modelo_id->id;

        } else{
            foreach ($actas  as $acta){
                $this->acta_id=$acta->id;
            }
        }
    }
    public function  addcierre($id){
        $this->partido_id=$id;
        $this->mensaje="conteovotos:".$this->conteovotos."mesa:".$this->mesa_id."<br></br>partido:".$this->partido_id;
        $cierres=Cierre::where('partido_id','=',$this->partido_id)->where('acta_id','=',$this->acta_id)->get();
        if($cierres->isEmpty()){
            $this->cierre_id="";
        } else {
            foreach ($cierres  as $cierre){
                $this->cierre_id=$cierre->id;
            }
        }

        Cierre::updateOrCreate(['id'=>$this->cierre_id],
            [
                'conteovotos'=>$this->conteovotos,
                'mesa_id'=> $this->mesa_id,
                'partido_id'=> $this->partido_id,
                'user_id'=> Auth::user()->id,
                'acta_id'=> $this->acta_id,
            ]);

        $this->conteovotos="";

    }

    public function guardar(){
        $this->validate([
            'diferencia'=> 'required|integer|min:0',
            'total'=> 'required|integer',
            'mesa_id'=> 'required|integer',
            'selecttipo'=>'required',
            'fotoacta' => 'required|array|max:1',
            'fotoacta.*'=> 'image|max:20000'
        ]);
         $image='';
        foreach ($this->fotoacta as $key => $image) {
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image = $this->fotoacta[$key]->store('Fotos_actas', 'public');
        }

        Acta::updateOrCreate(['id'=>$this->acta_id],
            [
                'votosasignadosacta'=> $this->votosasignados,
                'diferencia'=> $this->diferencia,
                'total'=> $this->total,
                'fotoacta'=> $image,
                'tipopartidoacta'=> $this->selecttipo,
                'mesa_id'=> $this->mesa_id,
                'user_id'=> Auth::user()->id,
            ]);


        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }

    public function alerta($id){
        $this->cierre_id=$id;
        $this->emit('done',[
            'error'=>['cierre-component','borrar']
        ]);
    }
  public  function borrar( ){
        Cierre::find($this->cierre_id)->delete();
        $this->modal=true;
  }



    public function abrirModal(){
        $this->modal =true;
    }

    public function cerrarModal(){
        $this->modal =false;
    }


    public function limpiarCampos(){
        $this->conteovotos="";
        $this->fotoacta=[];
        $this->partido_id="";
        $this->selecttipo="";
        $this->acta_id="";
        $this->mesa_id="";
        $this->cierre_id="";
        $this->diferencia=0;
        $this->total=0;
        $this->identificador = rand();
        $this->randoncierre = rand();


    }
}
