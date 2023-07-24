<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use App\Models\Cierre;
use App\Models\Sector;
use Livewire\Component;


class DashboardComponent extends Component
{
    public $dataalcalde=[];
    public $datapresidente=[];
    public $labelsalcalde=[];
    public $valuesalcalde=[];
    public $labelspresidente=[];
    public $valuespresidente=[];
    public $colorsalcalde=[];
    public $colorspresidente=[];
    public $nombrecentro,$nombresector;
    public $centros=[], $sectors=[];

    public function mount(){
        $this->nombrecentro='';
        $this->nombresector='';
        $this->centros= Centro::all();
        $this->sectors = Sector::all();
    }

    public function graficas(){
        if(!empty($this->nombrecentro)&&!empty($this->nombresector)) {

            //ALCALDE
//1
            $Cabal = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');
//2
            $Vamos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//3
            $Valor = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//4
            $Todos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//5
            $Azul = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Azul')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//6
            $UNE = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//7
            $MLP = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//8
            $Victoria = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//9
            $Nosotros = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//10
            $Viva = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//11
            $Union_Republicana = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//12
            $Cambio = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//13
            $Podemos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//14
            $PC = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//15
            $VOS = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//16
            $Movimiento_Semilla = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//17
            $BIEN = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//18
            $Partido_Popular = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Popular')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//19
            $Comunidad_Elefante = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');
//20
            $Nulo = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//21
            $Blanco = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//22
            $No_Valido = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');



            //PRESIDENTE
//1
            $Valor_Unionista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor Unionista')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//2
            $UNE2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//3
            $Partido_Azul2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Azul')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//4
            $Cabal2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//5
            $Todos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//6
            $Vamos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//7
            $Humanista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Humanista')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//8
            $Partido_Republicano2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Republicano')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//9
            $Podemos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//10
            $MLP2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//11
            $PIN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PIN')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//12
            $Victoria2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//13
            $Nosotros2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//14
            $Movimiento_Semilla2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//15
            $Union_Republicana2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//16
            $Comunidad_Elefante2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//17
            $FCN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','FCN')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//18
            $PC2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//19
            $URNG2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','URNG')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//20
            $Viva2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//21
            $BIEN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//22
            $Cambio2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//23
            $VOS2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//24
            $CREO2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','CREO')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//25
            $Mi_Familia2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Mi Familia')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//26
            $Nulo2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');


//27
            $Blanco2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//28
            $No_Valido2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');




        }

        if(!empty($this->nombrecentro)&&empty($this->nombresector)) {
            //ALCALDE
//1
            $Cabal = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');
//2
            $Vamos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//3
            $Valor = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//4
            $Todos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//5
            $Azul = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Azul')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//6
            $UNE = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//7
            $MLP = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//8
            $Victoria = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//9
            $Nosotros = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//10
            $Viva = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//11
            $Union_Republicana = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//12
            $Cambio = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//13
            $Podemos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//14
            $PC = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//15
            $VOS = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//16
            $Movimiento_Semilla = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//17
            $BIEN = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//18
            $Partido_Popular = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Popular')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//19
            $Comunidad_Elefante = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');
//20
            $Nulo = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//21
            $Blanco = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//22
            $No_Valido = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

            //PRESIDENTE
//1
            $Valor_Unionista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor Unionista')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//2
            $UNE2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//3
            $Partido_Azul2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Azul')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//4
            $Cabal2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//5
            $Todos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//6
            $Vamos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//7
            $Humanista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Humanista')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//8
            $Partido_Republicano2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Republicano')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//9
            $Podemos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//10
            $MLP2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//11
            $PIN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PIN')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//12
            $Victoria2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//13
            $Nosotros2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//14
            $Movimiento_Semilla2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//15
            $Union_Republicana2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//16
            $Comunidad_Elefante2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//17
            $FCN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','FCN')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//18
            $PC2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//19
            $URNG2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','URNG')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//20
            $Viva2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//21
            $BIEN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//22
            $Cambio2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//23
            $VOS2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//24
            $CREO2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','CREO')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//25
            $Mi_Familia2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Mi Familia')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//26
            $Nulo2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');


//27
            $Blanco2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');

//28
            $No_Valido2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Presidente')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            get()->sum('conteovotos');




        }

        if(empty($this->nombrecentro)&&!empty($this->nombresector)) {
            //ALCALDE
//1
            $Cabal = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');
//2
            $Vamos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//3
            $Valor = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//4
            $Todos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//5
            $Azul = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Azul')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//6
            $UNE = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//7
            $MLP = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//8
            $Victoria = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//9
            $Nosotros = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//10
            $Viva = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//11
            $Union_Republicana = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//12
            $Cambio = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//13
            $Podemos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//14
            $PC = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//15
            $VOS = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//16
            $Movimiento_Semilla = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//17
            $BIEN = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//18
            $Partido_Popular = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Popular')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//19
            $Comunidad_Elefante = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');
//20
            $Nulo = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//21
            $Blanco = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//22
            $No_Valido = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Alcalde')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');


//PRESIDENTE
//1
            $Valor_Unionista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor Unionista')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//2
            $UNE2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//3
            $Partido_Azul2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Azul')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//4
            $Cabal2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//5
            $Todos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//6
            $Vamos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//7
            $Humanista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Humanista')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//8
            $Partido_Republicano2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Republicano')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//9
            $Podemos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//10
            $MLP2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//11
            $PIN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PIN')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//12
            $Victoria2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//13
            $Nosotros2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//14
            $Movimiento_Semilla2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//15
            $Union_Republicana2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//16
            $Comunidad_Elefante2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//17
            $FCN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','FCN')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//18
            $PC2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//19
            $URNG2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','URNG')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//20
            $Viva2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//21
            $BIEN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//22
            $Cambio2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//23
            $VOS2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//24
            $CREO2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','CREO')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//25
            $Mi_Familia2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Mi Familia')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//26
            $Nulo2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');


//27
            $Blanco2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//28
            $No_Valido2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Presidente')->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');



        }

        if(empty($this->nombrecentro)&&empty($this->nombresector)) {

            //ALCALDE
//1
            $Cabal = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');
//2
            $Vamos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//3
            $Valor = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//4
            $Todos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//5
            $Azul = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Azul')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//6
            $UNE = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//7
            $MLP = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//8
            $Victoria = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//9
            $Nosotros = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//10
            $Viva = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Alcalde')->
            where('centros.nombrecentro','=',$this->nombrecentro)->
            where('sectors.nombresector','=',$this->nombresector)->
            get()->sum('conteovotos');

//11
            $Union_Republicana = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//12
            $Cambio = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//13
            $Podemos = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//14
            $PC = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//15
            $VOS = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//16
            $Movimiento_Semilla = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//17
            $BIEN = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//18
            $Partido_Popular = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Popular')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//19
            $Comunidad_Elefante = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');
//20
            $Nulo = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//21
            $Blanco = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

//22
            $No_Valido = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Alcalde')->
            get()->sum('conteovotos');

            //PRESIDENTE
//1
            $Valor_Unionista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Valor Unionista')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//2
            $UNE2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','UNE')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//3
            $Partido_Azul2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Azul')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//4
            $Cabal2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cabal')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//5
            $Todos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Todos')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//6
            $Vamos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Vamos')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//7
            $Humanista2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Humanista')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//8
            $Partido_Republicano2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Partido Republicano')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//9
            $Podemos2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Podemos')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//10
            $MLP2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','MLP')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//11
            $PIN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PIN')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//12
            $Victoria2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Victoria')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//13
            $Nosotros2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nosotros')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//14
            $Movimiento_Semilla2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Movimiento Semilla')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//15
            $Union_Republicana2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Unión Republicana')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//16
            $Comunidad_Elefante2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Comunidad Elefante')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//17
            $FCN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','FCN')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//18
            $PC2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','PC')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//19
            $URNG2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','URNG')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//20
            $Viva2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Viva')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//21
            $BIEN2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','BIEN')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//22
            $Cambio2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Cambio')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//23
            $VOS2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','VOS')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//24
            $CREO2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','CREO')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//25
            $Mi_Familia2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Mi Familia')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//26
            $Nulo2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Nulo')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');


//27
            $Blanco2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','Blanco')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');

//28
            $No_Valido2 = Cierre::join('partidos','partidos.id','cierres.partido_id')->
            join('mesas','mesas.id','cierres.mesa_id')->
            join('centros','centros.id','mesas.centro_id')->
            join('sectors','sectors.id','centros.sector_id')->
            where('partidos.nombrepartido','=','No Válido')->
            where('partidos.tipopartido','=','Presidente')->
            get()->sum('conteovotos');




        }

        $this->dataalcalde= [
            ['label' => 'Cabal', 'value' => $Cabal, 'color' => '#3374FF ','logo' => '/storage/Fotos_partidos/wPZq7E7gGZAZpu0JMwMRwiBui2D0OKS05TGkLJbu.png'],
            ['label' => 'Vamos', 'value' => $Vamos, 'color' => '#F6F6FC','logo' => '/storage/Fotos_partidos/mNX3wTG06Ctr7RRxdLG56tR2UUYdkeH84Nc2FLtR.png'],
            ['label' => 'Valor', 'value' => $Valor, 'color' => '#1DCFC9','logo' => '/storage/Fotos_partidos/qeLWWOU3b99noWK2L9SiQ0BgMFx0NwYULHUIF7k3.png'],
            ['label' => 'Todos', 'value' => $Todos, 'color' => '#9905C1','logo' => '/storage/Fotos_partidos/q2iAWM9xXn8yo5DiN5PMTD6AJ2fG7EHSmaufbXsl.png'],
            ['label' => 'Azul', 'value' => $Azul, 'color' => '#0558C1','logo' => '/storage/Fotos_partidos/9H8XWQxgAEEVGFJ1tHeqQ7r1YgYSpOSaSsi5tfjM.png'],
            ['label' => 'UNE', 'value' => $UNE, 'color' => '#05C111','logo' => '/storage/Fotos_partidos/KvlCqy6XMSVy0dCJWOG9PVt13B9tFC05HZHAy9OI.png'],
            ['label' => 'MLP', 'value' => $MLP, 'color' => '#F9D303','logo' => '/storage/Fotos_partidos/vBoI91x2xsjMPnw6BqSYMJioBpQFOda5UiEye6po.png'],
            ['label' => 'Victoria', 'value' => $Victoria, 'color' => '#F90A03','logo' => '/storage/Fotos_partidos/4kgTVBdBdqWftY1SH0aBK6mKyqXb0pLPY9WE5NbX.png'],
            ['label' => 'Nosotros', 'value' => $Nosotros, 'color' => '#051553','logo' => '/storage/Fotos_partidos/BkvIBRtdbDXYfGOtG21Pa4EdYdznPfKvtOEkfbuU.png'],
            ['label' => 'Viva', 'value' => $Viva, 'color' => '#0AB2FC','logo' => '/storage/Fotos_partidos/A9z6kewVx7EGLQF7VkxzRq1LEIqrvy63y6yHXK2q.png'],
            ['label' => 'Unión Republicana', 'value' => $Union_Republicana, 'color' => '#FD0000','logo' => '/storage/Fotos_partidos/VTccD3yIOXCsGQkF3lrZwhfb2reZZsWeZs3JfcLE.png'],
            ['label' => 'Cambio', 'value' => $Cambio, 'color' => '#26337C','logo' => '/storage/Fotos_partidos/P2i8tuUZObwQpcKWuewxAe26Z2NVsQMYBqtG1X9i.png'],
            ['label' => 'Podemos', 'value' => $Podemos, 'color' => '#F40130','logo' => '/storage/Fotos_partidos/Q5Bav0FA1VNX6Ch5Z3YYiS4hOvXZHX6SpjkA1PhO.png'],
            ['label' => 'PC', 'value' => $PC, 'color' => '#062DBF','logo' => '/storage/Fotos_partidos/fqh5ekqreH3mtAQJA2jo77cdV4xqOm7GqAzhDbl7.png'],
            ['label' => 'VOS', 'value' => $VOS, 'color' => '#DB008B','logo' => '/storage/Fotos_partidos/x2i5ZuoBHQ3vFBairoF1kp6LrmaWt3hLidzXZgGk.png'],
            ['label' => 'Movimiento Semilla', 'value' => $Movimiento_Semilla, 'color' => '#DCE603','logo' => '/storage/Fotos_partidos/Gh2Hiqq6PP13e9Y6ZICZuJsYioG0Q8wTLKTfmaDx.png'],
            ['label' => 'BIEN', 'value' => $BIEN, 'color' => '#E1D007','logo' => '/storage/Fotos_partidos/BiWj64u8mJNXrSayvqBVf5JCPYQL0mXpQQJfYMXM.png'],
            ['label' => 'Partido Popular', 'value' => $Partido_Popular, 'color' => '#4AF006','logo' => '/storage/Fotos_partidos/5oLkEcQJ3jN17UDpPowHoC6SoOnBiVyM2UxnisY7.png'],
            ['label' => 'Comunidad Elefante', 'value' => $Comunidad_Elefante, 'color' => '#060606','logo' => '/storage/Fotos_partidos/9aigH3kAfVUdSl53VA48AF4ybF7kTpIGWw2bVmQX.png'],
            ['label' => 'Nulo', 'value' => $Nulo, 'color' => '#F0D5CC','logo' => '/storage/Fotos_partidos/4d22mrZNEeM1ObfThsHzkcTguKh2jOvUxyp1g793.png'],
            ['label' => 'Blanco', 'value' => $Blanco, 'color' => '#F7F4F3','logo' => '/storage/Fotos_partidos/vVO7Hoybj3VxEmEME1UeJKPur1bulaufZuSjYHDS.png'],
            ['label' => 'No Válido', 'value' => $No_Valido, 'color' => '#E4DACA','logo' => '/storage/Fotos_partidos/qdn1yx55gQZnBFJS6bgvP10Zzu2e0CbL3hdzHAOd.png']
        ];

        $this->datapresidente= [
            ['label' => 'Cabal', 'value' => $Cabal2, 'color' => '#3374FF ','logo' => '/storage/Fotos_partidos/xnYzEJKRZsrL5gSyUYUFYXcexOdrJYvpF9ckZLxN.png'],
            ['label' => 'Vamos', 'value' => $Vamos2, 'color' => '#F6F6FC','logo' => '/storage/Fotos_partidos/v0OW7wxtSB4yPwDmTXy9IrLXxnjKP1DGb0lAQRQY.png'],
            ['label' => 'Valor', 'value' => $Valor_Unionista2, 'color' => '#1DCFC9','logo' => '/storage/Fotos_partidos/VCziD74zxeHB8wjqbnNGmdpwgKiZFkJUadQFts38.png'],
            ['label' => 'Todos', 'value' => $Todos2, 'color' => '#9905C1','logo' => '/storage/Fotos_partidos/ZTIi0PEaIESHrIRdWINVwJIbePfwGkfCQq0pDU4X.png'],
            ['label' => 'Azul', 'value' => $Partido_Azul2, 'color' => '#0558C1','logo' => '/storage/Fotos_partidos/R1vyLREGyVqKbLEgtHtV0Rcm8GHKztKZ3Dla2HLP.png'],
            ['label' => 'UNE', 'value' => $UNE2, 'color' => '#05C111','logo' => '/storage/Fotos_partidos/eCLC1UvYKMSayAQOjJGdLxgWvRTdS9feUnsRqqaq.png'],
            ['label' => 'MLP', 'value' => $MLP2, 'color' => '#F9D303','logo' => '/storage/Fotos_partidos/P4C9JBnxZuLwt5cZFxPAEXTuzsUahUC8HcJiFcBc.png'],
            ['label' => 'Victoria', 'value' => $Victoria2, 'color' => '#F90A03','logo' => '/storage/Fotos_partidos/iGHf8dWrtk7anWm9RuJFRPVl90clLBAZVfXsteZY.png'],
            ['label' => 'Nosotros', 'value' => $Nosotros2, 'color' => '#051553','logo' => '/storage/Fotos_partidos/n1V79HZb5klbx6WOa3edarhpz4zQdbA6IqpZtjYf.png'],
            ['label' => 'Viva', 'value' => $Viva2, 'color' => '#0AB2FC','logo' => '/storage/Fotos_partidos/vnjH7KM3PaE82UMRToQk9KNsdfemitSW011vz5Oz.png'],
         //   ['label' => 'Unión Republicana', 'value' => $Union_Republicana, 'color' => '#FD0000','logo' => ''],
            ['label' => 'Cambio', 'value' => $Cambio2, 'color' => '#26337C','logo' => '/storage/Fotos_partidos/B34s4aTCK5VOMX0zOZFJ0Te0AOtAN9ImzbwtMV0T.png'],
            ['label' => 'Podemos', 'value' => $Podemos2, 'color' => '#F40130','logo' => '/storage/Fotos_partidos/WWU2wgPNtCYjpqjhQzRyZzig9ANkJjWdnnobrWp3.png'],
            ['label' => 'PC', 'value' => $PC2, 'color' => '#062DBF','logo' => '/storage/Fotos_partidos/E1B3c3aMpEMvUbZ9Qp76VshNvHBzrEx19IU9zygg.png'],
            ['label' => 'VOS', 'value' => $VOS2, 'color' => '#DB008B','logo' => '/storage/Fotos_partidos/l3nrt1AEmeIY9ZMPXxBN5hCym6CSuVz6iGTnPT3C.png'],
            ['label' => 'Movimiento Semilla', 'value' => $Movimiento_Semilla2, 'color' => '#DCE603','logo' => '/storage/Fotos_partidos/zGgzlKnhXeWGnlxATSZC7fmE2dmUArIqBXnbpekL.png'],
            ['label' => 'BIEN', 'value' => $BIEN2, 'color' => '#E1D007','logo' => '/storage/Fotos_partidos/RZyKFtQSitFfefhX41wseVkcRVTr4ZNjgBtayCae.png'],
            ['label' => 'Partido Popular', 'value' => $Partido_Popular, 'color' => '#4AF006','logo' => '/storage/'],
            ['label' => 'Comunidad Elefante', 'value' => $Comunidad_Elefante2, 'color' => '#060606','logo' => '/storage/Fotos_partidos/1ZFTuuBxjaVpBBNmiGQDrt7O0JwD0v12AUm9ik1n.png'],
            ['label' => 'Nulo', 'value' => $Nulo2, 'color' => '#F0D5CC','logo' => '/storage/Fotos_partidos/8lQScF9YaS4NOvSEL564O2Qs66NB3Rd6amEDfyxI.png'],
            ['label' => 'Blanco', 'value' => $Blanco2, 'color' => '#F7F4F3','logo' => '/storage/Fotos_partidos/PcmGXTIjRynoubf46NATGGCO3I90XLialxAqBI5H.png'],
            ['label' => 'No Válido', 'value' => $No_Valido2, 'color' => '#E4DACA','logo' => '/storage/Fotos_partidos/UVLsbIsvrNqSJGsWz1gr4R8CNcke7wqIgcSLLW85.png'],

            ['label' => 'Humanista', 'value' => $Humanista2, 'color' => '#072A89','logo' => '/storage/Fotos_partidos/A1nyc98QJchoaQ7LhfjPWlgdVEgfshPXFgyIR5jh.png'],
            ['label' => 'Republicano', 'value' => $Partido_Republicano2, 'color' => '#FD0000','logo' => '/storage/Fotos_partidos/86DHGFfoMugqhMvwyjbc2xPg2wKTCjExQQt1gJEr.png'],
            ['label' => 'PIN', 'value' => $PIN2, 'color' => '#09090A','logo' => '/storage/Fotos_partidos/8hnO6CBoIRJu5Mi5rZyxONOaeJxJH3LwRHwrzQal.png'],
            ['label' => 'FCN', 'value' => $FCN2, 'color' => '#2104F2','logo' => '/storage/Fotos_partidos/0sfY7mCqg3He39Lmvruci55NRIlJY6gtjVL6qcIl.png'],
            ['label' => 'URNG', 'value' => $URNG2, 'color' => '#F2DC04','logo' => '/storage/Fotos_partidos/zcZROnGeGHilJP89Ez9GxikoYzK4OKpElR76FVzw.png'],
            ['label' => 'CREO', 'value' => $CREO2, 'color' => '#171716' ,'logo' => '/storage/Fotos_partidos/lXzTqgrAnoTv0yvnjWQOu8NBuweMPyGZm6A9XwkD.png'],
            ['label' => 'Mi Familia', 'value' => $Mi_Familia2, 'color' => '#91F58E' ,'logo' => '/storage/Fotos_partidos/HgjivQDWM5EuLnKia7pkTQxPtIkP7e5oJX3WUrKt.png'],
            ];


       usort($this->dataalcalde, function ($a, $b) {
           return $b['value'] - $a['value'];
      });

       usort($this->datapresidente, function ($a, $b) {
           return $b['value'] - $a['value'];
       });

          $this->labelsalcalde = collect($this->dataalcalde)->pluck('label');
          $this->valuesalcalde = collect($this->dataalcalde)->pluck('value');
          $this->colorsalcalde = collect($this->dataalcalde)->pluck('color');

        $this->labelspresidente = collect($this->datapresidente)->pluck('label');
        $this->valuespresidente = collect($this->datapresidente)->pluck('value');
        $this->colorspresidente = collect($this->datapresidente)->pluck('color');



        $this->emit('updateChartData', [
            'labelgraficaa' => $this->labelsalcalde,
            'valuegraficaa' => $this->valuesalcalde,
            'colorgraficaa' => $this->colorsalcalde,
            'labelgraficap' => $this->labelspresidente,
            'valuegraficap' => $this->valuespresidente,
            'colorgraficap' => $this->colorspresidente,
        ]);

    }


    public function imprimirpantalla(){
        $this->emit('imprimirpantalla');
    }

    public function render()
    {

        return view('livewire.dashboard-component', [
            $this->graficas()

        ]);
    }


    public  function limpiar(){

    }
}
