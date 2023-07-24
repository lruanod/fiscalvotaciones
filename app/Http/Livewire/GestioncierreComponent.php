<?php

namespace App\Http\Livewire;
use App\Models\Acta;
use App\Models\Cierre;
use Livewire\Component;
use Livewire\WithPagination;

class GestioncierreComponent extends Component
{

    use WithPagination;
    public $acta_id,$modal=0,$buscar;
    public $inicio="",$final="";
    public $fotos=[], $modalfoto=0;

    public function render()
    {
        return view('livewire.gestioncierre-component',[
            'actas' => $this->getActasProperty(),
            'cierres'=>Cierre::where('acta_id','=',$this->acta_id)->get()
        ]);
    }
    public function  mount(){
        $this->inicio="";
        $this->final="";
        $this->buscar="";
    }
    public function getActasProperty()
    {
        if (!empty($this->inicio) && !empty($this->final) && !empty($this->buscar)) {
            return Acta::join('mesas','mesas.id','actas.mesa_id')->whereBetween('actas.created_at', array($this->inicio, $this->final))->where('mesas.numeromesa','=',$this->buscar)->select('*','actas.id as acta_idd')->paginate(10, ['*'], 'actas_pagina');
        } else {
            if (!empty($this->inicio) && !empty($this->final) || !empty($this->buscar)) {
                return Acta::join('mesas','mesas.id','actas.mesa_id')->whereBetween('actas.created_at', array($this->inicio, $this->final))->orwhere('mesas.numeromesa','=',$this->buscar)->select('*','actas.id as acta_idd')->paginate(10, ['*'], 'actas_pagina');
            } else{
                if(!empty($this->buscar)){
                    return Acta::join('mesas','mesas.id','actas.mesa_id')->where('mesas.numeromesa','=',$this->buscar)->select('*','actas.id as acta_idd')->paginate(10, ['*'], 'actas_pagina');
                }else{
                    return Acta::join('mesas','mesas.id','actas.mesa_id')->select('*','actas.id as acta_idd')->paginate(10, ['*'], 'actas_pagina');
                }
            }

        }
    }



    public function vercierre($id){
        $this->acta_id=$id;
        $this->abrirModal();
    }



    public function verfoto($id){
        $this->fotos= Acta::where('id','=',$id)->get();
        $this->acta_id=$id;
        $this->abrirModalfoto();
    }


    public function abrirModal(){
        $this->modal =true;
    }
    public function abrirModalfoto(){
        $this->modalfoto =true;
    }




    public function cerrarModal(){
        $this->modal =false;
    }

    public function cerrarModalfoto(){
        $this->modalfoto =false;
        $this->limpiarCampos();
    }


    public function limpiarCampos(){
        $this->acta_id="";
        $this->fotos=[];
        $this->inicio="";
        $this->final="";
    }
}
