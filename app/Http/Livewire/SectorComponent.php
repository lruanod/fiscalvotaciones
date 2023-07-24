<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class SectorComponent extends Component
{
    use WithPagination;
    public  $nombresector, $centro_id,$modal=0,$buscar;
    public  $nombrecentro,$sector_id,$modalc=0;
    protected $listeners =['borrar','borrarcentro'];


    public function render()
    {
        return view('livewire.sector-component',[
            'sectors' => $this->getSectorsProperty(),
        ]);
    }

    public function getSectorsProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Sector::where('nombresector','like',$busqueda)->paginate(8,['*'],'sector_pagina');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function editar($id){
        $sector= Sector::find($id);
        $this->sector_id=$id;
        $this->nombresector=$sector->nombresector;
        $this->abrirModal();
    }

    public function editarc($id){
        $centro= Centro::find($id);
        $this->centro_id=$id;
        $this->nombrecentro=$centro->nombrecentro;
        $this->sector_id=$centro->sector_id;
        $this->abrirModalc();
    }

    public function addcentro($id){
        $this->limpiarCampos();
        $this->sector_id=$id;
        $this->abrirModalc();

    }
    public function guardar(){
        $this->validate([
            'nombresector'=> 'required|string|min:4|max:100',
        ]);

        Sector::updateOrCreate(['id'=>$this->sector_id],
            [
                'nombresector'=> $this->nombresector,
            ]);
        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }

    public function guardarcentro(){
        $this->validate([
            'nombrecentro'=> 'required|string|min:2|max:100',
        ]);

        Centro::updateOrCreate(['id'=>$this->centro_id],
            [
                'nombrecentro'=> $this->nombrecentro,
                'sector_id'=>$this->sector_id
            ]);
        $this->cerrarModalc();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }

    public function alerta($id){
        $this->sector_id=$id;
        $this->emit('done',[
            'error'=>['sector-component','borrar']
        ]);

    }

    public function alertacentro($id){
        $this->centro_id=$id;
        $this->emit('done',[
            'error'=>['sector-component','borrarcentro']
        ]);
    }

    public function borrar(){
        Sector::find($this->sector_id)->delete();
    }
    public function borrarcentro(){
        Centro::destroy($this->centro_id);
    }

    public function abrirModal(){
        $this->modal =true;
    }
    public function abrirModalc(){
        $this->modalc =true;
    }

    public function cerrarModal(){
        $this->modal =false;
    }
    public function cerrarModalc(){
        $this->modalc =false;
    }

    public function limpiarCampos(){
        $this->nombresector="";
        $this->sector_id="";
        $this->buscar="";

        $this->nombrecentro="";
        $this->centro_id="";
    }
}
