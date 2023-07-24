<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-city text-white text-2xl"> Permisos</li>
    </div>
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8 sm:rounded-lg px-5 py-5 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <button wire:click="crear()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo permiso</button>
                        <button wire:click="crearr()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo rol</button>
                    </div>
                    <div>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                </div>
                @if($modal)
                    @include('livewire.permisos.crear')
                @endif
                @if($modalr)
                    @include('livewire.permisos.crear_rol')
                @endif
                <div class="overflow-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-blue-700 text-white border-white">
                            <th class="px-1 py-1 mb-1">No.</th>
                            <th class="border">Nombre permiso</th>
                            <th class="border">Roles</th>
                            <th class="border">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($permisos as $per)
                            <tr class="hover:bg-green-100 text-lg">
                                <td class="border px-1 py-1">{{($permisos->currentpage()-1)*$permisos->perpage()+$loop->index+1}}</td>
                                <td class="border">{{$per->name}}</td>
                                <td class="border">
                                    @foreach($per->roles as $rol)
                                        {{$rol->name}} <br>
                                    @endforeach
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="editar({{$per->id}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-save"></i> Editar</button>
                                    <button wire:click="alerta({{$per->id}})" class="bg-red-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1  rounded"><i class="fa-solid fa-trash-can"></i> Borrar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$permisos->links()}}
        </div>
    </div>

</div>
