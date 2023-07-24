<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-city text-white text-2xl"> Roles</li>
    </div>
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8 sm:rounded-lg px-5 py-5 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <button wire:click="crear()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo rol</button>
                        @can('permisos')
                            <button wire:click="crearp()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo permiso</button>
                        @endcan
                    </div>
                    <div>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                </div>
                @if($modal)
                    @include('livewire.roles.crear')
                @endif
                @if($modalp)
                    @include('livewire.roles.crear_permiso')
                @endif
                @if($modaladdp)
                    @include('livewire.roles.editar_permiso')
                @endif
                <div class="overflow-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-blue-700 text-white border-white">
                            <th class="border">No.</th>
                            <th class="border">Nombre rol</th>
                            <th class="border">Permisos</th>
                            <th class="border">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($roles as $rol)

                            <tr class="hover:bg-green-100 text-lg">
                                <td class="border px-0 py-0">{{($roles->currentpage()-1)*$roles->perpage()+$loop->index+1}}</td>
                                <td class="border">{{$rol->name}}</td>
                                <td class="border">
                                    @foreach($rol->permissions as $per)
                                        {{$per->name}} <br>
                                    @endforeach
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="editar({{$rol->id}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-save"></i> Editar</button>
                                    <button wire:click="alerta({{$rol->id}})" class="bg-red-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1  rounded"><i class="fa-solid fa-trash-can"></i> Borrar</button>
                                    <button wire:click="editarpermisos({{$rol->id}})" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-check-circle"></i> Asignar permiso</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$roles->links()}}
        </div>
    </div>

</div>




