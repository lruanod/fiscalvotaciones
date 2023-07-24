<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class UsuarioComponent extends Component
{
    use WithPagination;
    public  $name,$celular,$usuario,$email,$password,$usuario_id, $modal=0,$buscar;
    public  $role_us=[''],$roles=[];
    protected $listeners =['borrar','borrarasigrol'];

    public function mount(){
        $this->roles=Role::all()->pluck('name');
    }


    public function render()
    {

        return view('livewire.usuario-component',[
            'usuarios' => $this->getUsuariosProperty(),
        ]);
    }

    public function getUsuariosProperty(){
        $busqueda='%'.$this->buscar.'%';
    //    if(Auth::user()->usuario=='lruano'|| Auth::user()->usuario=='jucapiro'){
            return User::where('name','like',$busqueda)->paginate(8,['*'],'usuario_pagina');
      //  } else{
            return User::where('name','like',$busqueda)->where('usuario','<>','lruano')->where('usuario','<>','jucapiro')->paginate(8,['*'],'usuario_pagina');
      //  }

    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal =true;
    }
    public function guardar(){
        if($this->usuario_id=="") {
            $this->validate([
                'name'=> 'required|string|min:4|max:5000',
                'usuario'=> 'required|string|max:45|unique:users',
                'celular'=> 'required|string|min:8|max:10',
                'email'=> 'required|email|max:45|unique:users',
                'password'=> 'required|string|min:4|max:200',
                'role_us' => 'required|array'
            ]);

            User::updateOrCreate(['id'=>$this->usuario_id],
                [
                    'name'=> $this->name,
                    'usuario'=> $this->usuario,
                    'celular'=> $this->celular,
                    'email'=> $this->email,
                    'password'=> bcrypt($this->password)
                ])->assignRole($this->role_us);
        } else{
            $this->validate([
                'name'=> 'required|string|min:4|max:5000',
                'celular'=> 'required|string|min:8|max:10',
                'password'=> 'required|string|min:4|max:200',
                'role_us' => 'required|array'
            ]);

            User::updateOrCreate(['id'=>$this->usuario_id],
                [
                    'name'=> $this->name,
                    'celular'=> $this->celular,
                    'password'=> bcrypt($this->password)
                ])->roles()->detach();
            $usuario= User::find($this->usuario_id);
            $usuario->assignRole($this->role_us);
        }

        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done',[
            'success'=>'Operación realizada con exito'
        ]);

    }

    public function editar($usuario_id){
        $usuario= User::find($usuario_id);
        $this->usuario_id=$usuario_id;
        $this->name=$usuario->name;
        $this->usuario=$usuario->usuario;
        $this->celular=$usuario->celular;
        $this->email=$usuario->email;
        $this->role_us=$usuario->roles->pluck('name');

        // $this->password=$usuario->password;


        $this->abrirModal();
    }

    public function addrol($usuario_id){
        $this->limpiarCampos();
        $this->usuario_id=$usuario_id;
        $this->abrirModalr();

    }

    public function cerrarModal(){
        $this->modal =false;
    }

    public function alerta($id){
        $this->usuario_id=$id;
        $this->emit('done',[
            'error'=>['usuario-component','borrar']
        ]);

    }

    public function borrar(){
        User::find($this->usuario_id)->delete();
    }



    public function  limpiarCampos(){

        $this->name="";
        $this->usuario="";
        $this->celular="";
        $this->password="";
        $this->email="";
        $this->buscar="";
        $this->role_us=[''];

        $this->usuario_id="";



    }
}
