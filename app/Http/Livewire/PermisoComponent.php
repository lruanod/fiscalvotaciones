<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class PermisoComponent extends Component
{
    use WithPagination;
    public $nombre_rol, $role_id, $modal = 0, $buscar;
    public $role_permisos = [''], $roles = [];

    public $nombre_permiso, $permiso_id, $modalr = 0;

    protected $listeners = ['borrar'];

    public function mount()
    {
        $this->roles = Role::all()->pluck('name');
    }


    public function render()
    {
        return view('livewire.permiso-component', [
            'permisos' => $this->getPermisosProperty(),
            // $this->roles = Role::all()->pluck('name');
        ]);
    }

    public function getPermisosProperty()
    {
        $busqueda = '%' . $this->buscar . '%';
        return Permission::where('name', 'like', $busqueda)->paginate(10, ['*'], 'permiso_pagina');
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
            'nombre_permiso' => 'required|string|min:4|max:5000|unique:permissions,name',
        ]);

        Permission::updateOrCreate(['id' => $this->permiso_id],
            [
                'name' => $this->nombre_permiso,
                'guard_name' =>'web'
            ]);

        $this->cerrarModal();
        $this->limpiarCampos();
        $this->emit('done', [
            'success' => 'Operación realizada con exito'
        ]);



    }

    public function editar($permiso_id)
    {
        $permiso = Permission::find($permiso_id);
        $this->permiso_id = $permiso_id;
        $this->nombre_permiso = $permiso->name;

        $this->abrirModal();
    }

    public function crearr()
    {
        $this->limpiarCampos();
        $this->abrirModalr();

    }

    public function abrirModalr()
    {
        $this->modalr = true;
    }

    public function guardarr()
    {
        $this->validate([
            'nombre_rol' => 'required|string|min:4|max:5000|unique:roles,name',
        ]);

        Role::updateOrCreate(['id' => $this->role_id],
            [
                'name' => $this->nombre_rol,
                'guard_name' =>'web'
            ]);

        $this->cerrarModalr();
        $this->limpiarCampos();
        $this->emit('done', [
            'success' => 'Operación realizada con exito'
        ]);

    }




    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function cerrarModalr()
    {
        $this->modalr = false;
    }



    public function alerta($id)
    {
        $this->permiso_id = $id;
        $this->emit('done', [
            'error' => ['permiso-component', 'borrar']
        ]);

    }

    public function borrar()
    {
        Permission::find($this->permiso_id)->delete();
    }


    public function limpiarCampos()
    {

        $this->nombre_rol = "";
        $this->buscar = "";
        $this->role_id = "";

        $this->nombre_permiso = "";
        $this->permiso_id = "";

        $this->role_permisos = [''];


    }

}
