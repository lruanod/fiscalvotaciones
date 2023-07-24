<?php

namespace App\Http\Livewire;


use App\Models\Partido;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
Use Storage;





class PartidoComponent extends Component
{
    use WithFileUploads,WithPagination;
    public $tipopartido="",$nombrepartido="",$fotopartido=[],$partido_id="",$identificador,$buscar,$modal=0,$modaleditar=0, $fotopartido2="";
    protected $listeners =['borrar'];


    public function mount(){
        $this->identificador = rand();

    }


    public function render()
    {
        return view('livewire.partido-component',[
            'partidos' => $this->getPartidosProperty(),
        ]);
    }

    public function getPartidosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Partido::where('nombrepartido','like',$busqueda)->paginate(8,['*'],'partido_pagina');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function guardar(){
        $this->validate([
            'tipopartido'=> 'required|string|max:45',
            'nombrepartido'=> 'required|string|max:100',
            'fotopartido' => 'array|max:1',
            'fotopartido.*'=> 'image|max:20000'
        ]);


        foreach ($this->fotopartido as $key => $image) {
            // eliminar archivo existente
            Storage::disk('public')->delete($this->fotopartido2);
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image = $this->fotopartido[$key]->store('Fotos_partidos', 'public');
        }

           Partido::updateOrCreate(['id'=>$this->partido_id],
            [
                'tipopartido'=> $this->tipopartido,
                'nombrepartido'=> $this->nombrepartido,
                'fotopartido'=> $image,
            ]);


        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }


    public function editar($id){
        $partido= Partido::find($id);
        $this->partido_id=$id;
        $this->tipopartido=$partido->tipopartido;
        $this->nombrepartido=$partido->nombrepartido;
        $this->fotopartido2=$partido->fotopartido;
        $this->abrirModale();
    }

    public function alerta($id){
        $this->partido_id=$id;
        $this->emit('done',[
            'error'=>['partido-component','borrar']
        ]);
    }
    public function borrar(){
        $partido= Partido::find($this->partido_id);
        // eliminar archivo existente
        Storage::disk('public')->delete($partido->fotopartido);
        //eliminar
        Partido::destroy($this->partido_id);

    }


    public function abrirModal(){
        $this->modal =true;
    }

    public function cerrarModal(){
        $this->modal =false;
    }

    public function abrirModale(){
        $this->modaleditar =true;
    }

    public function cerrarModale(){
        $this->modaleditar =false;
    }

    public function limpiarCampos(){
        $this->tipopartido="";
        $this->nombrepartido="";
        $this->fotopartido=[];
        $this->fotopartido2="";
        $this->identificador = rand();
        $this->partido_id="";
    }

}
