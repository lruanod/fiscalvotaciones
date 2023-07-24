<?php

namespace App\Http\Livewire;


use App\Models\Asignacionmesa;
use App\Models\Mesa;
use App\Models\Partido;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;



class AsignacionmesaComponent extends Component
{
    use WithPagination;
    public $user_id="",$mesa_id="",$asignacionmesa_id,$buscar,$modal=0;
    protected $listeners =['borrar'];



    public function render()
    {
        return view('livewire.asignacionmesa-component',[
            'asignaciones' => $this->getAsignacionmesasProperty(),
            'usuarios' => User::all(),
            'mesas' => Mesa::all(),
        ]);
    }

    public function getAsignacionmesasProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Asignacionmesa::join('users','users.id','asignacionmesas.user_id')->where('users.name','like',$busqueda)->select('*','asignacionmesas.id as asignacion_idd')->paginate(8,['*'],'Asignacion_pagina');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function guardar(){
        $this->validate([
            'user_id'=> 'required|integer',
            'mesa_id'=> 'required|integer'
        ]);

        Asignacionmesa::updateOrCreate(['id'=>$this->asignacionmesa_id],
            [
                'user_id'=> $this->user_id,
                'mesa_id'=> $this->mesa_id
            ]);


        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }


    public function editar($id){
        $asignacionmesa= Asignacionmesa::find($id);
        $this->asignacionmesa_id=$id;
        $this->user_id=$asignacionmesa->user_id;
        $this->mesa_id=$asignacionmesa->mesa_id;
        $this->abrirModal();
    }

    public function alerta($id){
        $this->asignacionmesa_id=$id;
        $this->emit('done',[
            'error'=>['asignacionmesa-component','borrar']
        ]);
    }
    public function borrar(){
        Asignacionmesa::destroy($this->asignacionmesa_id);

    }


    public function abrirModal(){
        $this->modal =true;
    }

    public function cerrarModal(){
        $this->modal =false;
    }




    public function limpiarCampos(){
        $this->user_id="";
        $this->mesa_id="";
        $this->asignacionmesa_id="";
    }

}
