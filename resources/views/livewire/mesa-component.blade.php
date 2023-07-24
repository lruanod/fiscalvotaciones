<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-table text-white text-2xl">  Mesas</li>
    </div>
    <div class="w-full mx-auto sm:px6 lg:px-8 sm:rounded-lg px-2 py-2 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="w-full mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-4 gap-4 ">
                    <div>
                        @can('mesas.crear')
                            <button wire:click="crear()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo</button>
                        @endcan
                    </div>
                    <div>
                        <label for="buscar" class="text-gray-700 text-sm font-bold mb-2">No.mesa</label>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                    <div>
                        <label for="selectcentro_id" class="text-gray-700 text-sm font-bold mb-2">Centro</label>
                        <select id="selectcentro_id" wire:model="selectcentro_id" class="bg-gray-50 border border-gray-300 text-gray-700  w-full py-2 px-3 my-4 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">seleccionar</option>
                            @foreach($centros as $centro2)
                                <option value="{{$centro2->id}}">{{$centro2->id}}&ensp;{{$centro2->nombrecentro}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="selectsector_id" class="text-gray-700 text-sm font-bold mb-2">Sector</label>
                        <select id="selectsector_id" wire:model="selectsector_id" class="bg-gray-50 border border-gray-300 text-gray-700  w-full py-2 px-3 my-4 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">seleccionar</option>
                            @foreach($sectors as $sector2)
                                <option value="{{$sector2->id}}">{{$sector2->id}}&ensp;{{$sector2->nombresector}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                @if($modal)
                    @include('livewire.mesas.crear')
                @endif
                <div class="overflow-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-blue-700 text-white border-white">
                            <th>No.mesa</th>
                            <th>Votos asignados</th>
                            <th>Centros de votación</th>
                            <th>Sector</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($mesas as $mesa)
                            <tr class="hover:bg-green-100">
                                <td class="border">{{$mesa->numeromesa}}</td>
                                <td class="border">{{$mesa->votosasignados}}</td>
                                <td class="border">{{$mesa->centro->nombrecentro}}</td>
                                <td class="border">{{$mesa->centro->sector->nombresector}}</td>
                                <td class="border">
                                    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-3 ">
                                        <div>
                                            @can('mesas.editar')
                                                <button wire:click="editar({{$mesa->id}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-save"></i> {{$mesa->id}}Editar</button>
                                            @endcan
                                        </div>
                                        <div>
                                            @can('mesas.eliminar')
                                                <button wire:click="alerta({{$mesa->id}})" class="bg-red-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1  rounded"><i class="fa-solid fa-trash-can"></i> {{$mesa->id}}Borrar</button>
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

            {{$mesas->links()}}
        </div>
    </div>

</div>




