<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-map-location text-white text-2xl">  Partidos</li>
    </div>
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8 sm:rounded-lg px-5 py-5 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        @can('partidos.crear')
                            <button wire:click="crear()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo</button>
                        @endcan
                    </div>
                    <div>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                </div>
                @if($modal)
                    @include('livewire.partidos.crear')
                @endif
                @if($modaleditar)
                    @include('livewire.partidos.editar')
                @endif
                <div class="overflow-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-blue-700 text-white border-white">
                            <th>No.</th>
                            <th>Partido</th>
                            <th>Tipo</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($partidos as $partido)
                            <tr class="hover:bg-green-100">
                                <td class="border">{{($partidos->currentpage()-1)*$partidos->perpage()+$loop->index+1}}</td>
                                <td class="border">{{$partido->nombrepartido}}</td>
                                <td class="border">{{$partido->tipopartido}}</td>
                                <td class="border">
                                    <img src="{{asset("storage/$partido->fotopartido")}}" class="object-cover h-50 w-50 ">
                                </td>
                                <td class="border">
                                    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-3 ">
                                        <div>
                                            @can('partidos.editar')
                                                <button wire:click="editar({{$partido->id}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-save"></i> Editar</button>
                                            @endcan
                                        </div>
                                        <div>
                                            @can('partidos.eliminar')
                                                <button wire:click="alerta({{$partido->id}})" class="bg-red-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1  rounded"><i class="fa-solid fa-trash-can"></i> Borrar</button>
                                            @endcan
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$partidos->links()}}
        </div>
    </div>

</div>




