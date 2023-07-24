<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\UsuarioComponent;
use App\Http\Livewire\RolComponent;
use App\Http\Livewire\PermisoComponent;
use App\Http\Livewire\SectorComponent;
use App\Http\Livewire\MesaComponent;
use App\Http\Livewire\PartidoComponent;
use App\Http\Livewire\CierreComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\AsignacionmesaComponent;
use App\Http\Livewire\GestioncierreComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/foo', function () {
    Artisan::call('storage:link');
});
Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   // Route::get('/dashboard', function () {return view('dashboard');
  //  })->name('dashboard');

    Route::get('/dashboard',DashboardComponent::class);
    Route::get('/usuarios',UsuarioComponent::class)->middleware('can:usuarios');
    Route::get('/roles',RolComponent::class)->middleware('can:roles');
    Route::get('/permisos',PermisoComponent::class)->middleware('can:permisos');
    Route::get('/sectores',SectorComponent::class)->middleware('can:sectores');
    Route::get('/mesas',MesaComponent::class)->middleware('can:mesas');
    Route::get('/partidos',PartidoComponent::class)->middleware('can:partidos');
    Route::get('/cierres',CierreComponent::class)->middleware('can:cierres');
    Route::get('/asignacionmesas',AsignacionmesaComponent::class)->middleware('can:asignacionmesas');
    Route::get('/gestioncierres',GestioncierreComponent::class)->middleware('can:gestioncierres');

});
