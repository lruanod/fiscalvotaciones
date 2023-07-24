<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-book-atlas text-white text-2xl">  Cierre de acta</li>
    </div>
    <div class="w-full mx-auto sm:px6 lg:px-8 sm:rounded-lg px-2 py-2 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="w-full mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 gap-1 ">
                    <div>
                        <label for="buscar" class="text-gray-700 text-sm font-bold mb-2">No.mesa</label>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                </div>
                @if($modal)
                    @include('livewire.cierres.crear')
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
                                <td class="border">{{$mesa->mesa->numeromesa}}</td>
                                <td class="border">{{$mesa->mesa->votosasignados}}</td>
                                <td class="border">{{$mesa->mesa->centro->nombrecentro}}</td>
                                <td class="border">{{$mesa->mesa->centro->sector->nombresector}}</td>
                                <td class="border">
                                    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-3 ">
                                        <div>
                                            @can('cierres.crear')
                                                <button wire:click="crear({{$mesa->mesa->id}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"><i class="fa-solid fa-add"></i>Acta</button>
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




