<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolComponent extends Component
{
    use WithPagination;
    public $nombre_rol, $role_id, $modal = 0 ,$buscar;
    public $role_permisos = [''], $permisos = [];

    public $nombre_permiso,$permiso_id,$modalp=0;
    public $modaladdp=0;

    protected $listeners = ['borrar'];




    public function render()
    {
        return view('livewire.rol-component', [
            'roles' => $this->getRolesProperty(),
            $this->permisos =Permission::all()->pluck('name')
        ]);
    }

    public function getRolesProperty()
    {
        $busqueda = '%' . $this->buscar . '%';
        return Role::where('name', 'like', $busqueda)->paginate(8, ['*'], 'role_pagina');
    }


    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function guardar()
    {
        $this->validate([
            'nombre_rol' => 'required|string|min:4|max:5000|unique:roles,name',
        ]);

        Role::updateOrCreate(['id' => $this->role_id],
            [
                'name' => $this->nombre_rol,
                'guard_name' =>'web'
            ]);

        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done', [
            'success' => 'Operación realizada con exito'
        ]);

    }

    public function editar($role_id)
    {
        $role = Role::find($role_id);
        $this->role_id = $role_id;
        $this->nombre_rol = $role->name;

        $this->abrirModal();
    }

    public function crearp()
    {
        $this->limpiarCampos();
        $this->abrirModalP();

    }
    public function abrirModalp(){
        $this->modalp = true;
    }

    public function guardarp()
    {
        $this->validate([
            'nombre_permiso' => 'required|string|min:4|max:5000|unique:permissions,name',
        ]);

        Permission::updateOrCreate(['id' => $this->permiso_id],
            [
                'name' => $this->nombre_permiso,
                'guard_name' =>'web'
            ]);

        $this->cerrarModalp();
        $this->limpiarCampos();
        $this->emit('done', [
            'success' => 'Operación realizada con exito'
        ]);



    }

    public function editarpermisos($role_id){
        $this->limpiarCampos();
        $role = Role::find($role_id);
        $this->role_id=$role_id;
        $this->role_permisos=$role->permissions->pluck('name');
        $this->abrirModaladdpermiso();
    }

    public function abrirModaladdpermiso()
    {
        $this->modaladdp = true;
    }

    public function asignarpermiso(){
        $role = Role::find($this->role_id);

        $this->validate([
            'role_permisos' => 'required|array'
        ]);
        $role->syncPermissions($this->role_permisos);

        $this->cerrarModaladdpermiso();
        $this->limpiarCampos();
        $this->emit('done', [
            'success' => 'Operación realizada con exito'
        ]);

    }



    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function cerrarModalp()
    {
        $this->modalp = false;
    }

    public function cerrarModaladdpermiso()
    {
        $this->modaladdp = false;
    }



    public function alerta($id)
    {
        $this->role_id = $id;
        $this->emit('done', [
            'error' => ['rol-component', 'borrar']
        ]);

    }

    public function borrar()
    {
        Role::find($this->role_id)->delete();
    }


    public function limpiarCampos()
    {

        $this->nombre_rol ="";
        $this->buscar ="";
        $this->role_id ="";

        $this->nombre_permiso="";
        $this->permiso_id="";

        $this->role_permisos = [''];




    }
}
