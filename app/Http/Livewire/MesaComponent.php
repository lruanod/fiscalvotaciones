<?php

namespace App\Http\Livewire;


use App\Models\Centro;
use App\Models\Departamento;
use App\Models\Mesa;
use App\Models\Reporte;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class MesaComponent extends Component
{
    use WithPagination;
    public  $numeromesa,$votosasignados, $centro_id,$mesa_id, $selectcentro_id, $selectsector_id,$modal=0,$buscar;
    protected $listeners =['borrar'];

    public function render()
    {
        return view('livewire.mesa-component',[
            'centros' => Centro::all(),
            'sectors' => Sector::all(),
            'mesas' => $this->getMesasProperty(),
        ]);
    }

    public function getMesasProperty(){
        if (!empty($this->selectcentro_id) && !empty($this->selectsector_id) && !empty($this->buscar) ) {
            return Mesa::join('centros','centros.id','=','mesas.centro_id')->where('centros.sector_id','=',$this->selectsector_id)->where('mesas.numeromesa','=',$this->buscar)->where('mesas.centro_id','=',$this->selectcentro_id)->paginate(10,['*'],'Mesa_pagina');
        }
        if (!empty($this->selectcentro_id) && !empty($this->selectsector_id) && empty($this->buscar) ) {
            return Mesa::join('centros','centros.id','=','mesas.centro_id')->where('centros.sector_id','=',$this->selectsector_id)->where('mesas.centro_id', '=', $this->selectcentro_id)->paginate(10, ['*'], 'Mesa_pagina');
        }
        if (!empty($this->selectcentro_id) && empty($this->selectsector_id) && !empty($this->buscar) ) {
            return Mesa::where('numeromesa','=',$this->buscar)->where('centro_id','=',$this->selectcentro_id)->paginate(10,['*'],'Mesa_pagina');
        }
        if (empty($this->selectcentro_id) && !empty($this->selectsector_id) && !empty($this->buscar) ) {
            return Mesa::join('centros','centros.id','=','mesas.centro_id')->where('centros.sector_id','=',$this->selectsector_id)->where('mesas.numeromesa','=',$this->buscar)->paginate(10,['*'],'Mesa_pagina');
        }

        if (empty($this->selectcentro_id) && empty($this->selectsector_id) && !empty($this->buscar) ) {
            return Mesa::where('numeromesa','=',$this->buscar)->paginate(10,['*'],'Mesa_pagina');
        }

        if (!empty($this->selectcentro_id) && empty($this->selectsector_id) && empty($this->buscar) ) {
            return Mesa::where('centro_id','=',$this->selectcentro_id)->paginate(10,['*'],'Mesa_pagina');
        }

        if (!empty($this->selectsector_id) && empty($this->buscar) && empty($this->selectcentro_id)) {
            return Mesa::join('centros','centros.id','=','mesas.centro_id')->where('centros.sector_id','=',$this->selectsector_id)->paginate(10,['*'],'Mesa_pagina');
        }

        if (empty($this->selectsector_id) && empty($this->buscar) && empty($this->selectcentro_id)) {
            return Mesa::paginate(10,['*'],'Mesa_pagina');
        }



    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function editar($id){
        $mesa= Mesa::find($id);
        $this->mesa_id=$id;
        $this->numeromesa=$mesa->numeromesa;
        $this->votosasignados=$mesa->votosasignados;
        $this->centro_id=$mesa->centro_id;
        $this->abrirModal();
    }

    public function guardar(){
        $this->validate([
            'numeromesa'=> 'required|integer',
            'votosasignados'=> 'required|integer',
            'centro_id'=> 'required|integer',
        ]);

        Mesa::updateOrCreate(['id'=>$this->mesa_id],
            [
                'numeromesa'=> $this->numeromesa,
                'votosasignados'=> $this->votosasignados,
                'centro_id'=> $this->centro_id,
            ]);
       // $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }


    public function alerta($id){
        $this->mesa_id=$id;
        $this->emit('done',[
            'error'=>['mesa-component','borrar']
        ]);

    }

    public function borrar(){
        Mesa::find($this->mesa_id)->delete();
    }

    public function abrirModal(){
        $this->modal =true;
    }

    public function cerrarModal(){
        $this->modal =false;
    }


    public function limpiarCampos(){
        $this->numeromesa="";
        $this->votosasignados="";
    //  $this->centro_id="";
        $this->mesa_id="";
        $this->buscar="";

    }
}
