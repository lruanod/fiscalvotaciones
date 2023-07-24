<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-file-excel text-white text-2xl">  Gestion Actas</li>
    </div>
    <div class="w-full mx-auto sm:px6 lg:px-8 sm:rounded-lg px-2 py-2 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="w-full mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-1 py-4">
                <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-3 gap-3 ">
                    <div>
                        <label for="inicio"  class="text-gray-700 text-sm font-bold mb-2">Fecha inicio</label>
                        <input id="inicio" wire:model="inicio"  type="date"  class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" >
                        @error('inicio')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="final"  class="text-gray-700 text-sm font-bold mb-2">Fecha final</label>
                        <input id="final" wire:model="final" type="date" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" >
                        @error('final')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="buscar"  class="text-gray-700 text-sm font-bold mb-2">Buscar No.</label>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                </div>
                @if($modal)
                    @include('livewire.gestioncierres.vercierres')
                @endif
                @if($modalfoto)
                    @include('livewire.gestioncierres.verfoto')
                @endif
                <div class="overflow-auto">
                    <table class="table-auto w-full" >
                        <thead>
                        <tr class="bg-blue-700 text-white border-white py-2 px-2">
                            <th class="border">No.</th>
                            <th class="border"># Mesa</th>
                            <th class="border">Votos asignados</th>
                            <th class="border">Tipo de cargo</th>
                            <th class="border">Usuario</th>
                            <th class="border">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($actas as $acta)
                            <tr class="hover:bg-green-100 text-sm">
                                <td class="border px-0 py-0">{{($actas->currentpage()-1)*$actas->perpage()+$loop->index+1}}</td>
                                <td class="border ">{{$acta->mesa->numeromesa}}</td>
                                <td class="border ">{{$acta->votosasignadosacta}}</td>
                                <td class="border ">{{$acta->tipopartidoacta}}</td>
                                <td class="border">{{$acta->user->name}}</td>
                                <td class="border">
                                    @can('gestioncierres.verfoto')
                                        <button wire:click="verfoto({{$acta->acta_idd}})" class="bg-violet-700 hover:bg-gray-500 text-white font-bold py-1  px-1 mb-1 rounded"><i class="fa-solid fa-image"></i> Fotos{{$acta->acta_idd}}</button>
                                    @endcan

                                    @can('gestioncierres.vercierre')
                                        <button wire:click="vercierre({{$acta->acta_idd}})" class="bg-yellow-500 hover:bg-gray-500 text-white font-bold py-1  px-1 mb-1 rounded"><i class="fa-solid fa-file-excel"></i> Cierres {{$acta->acta_idd}}</button>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$actas->links()}}
        </div>

    </div>


</div>




