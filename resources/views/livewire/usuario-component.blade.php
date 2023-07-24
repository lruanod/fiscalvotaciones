<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-user text-white text-2xl"> Usuarios</li>
    </div>
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8 sm:rounded-lg px-5 py-5 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <button wire:click="crear()" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 my-3 rounded "><i class="fa-solid fa-file-circle-plus"></i> Nuevo</button>
                    </div>
                    <div>
                        <input id="buscar" wire:model="buscar" type="text" class="shadow appearance-none rounded  w-full py-2 px-3 my-4 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Buscar" >
                    </div>
                </div>
                @if($modal)
                    @include('livewire.usuarios.crear')
                @endif
                <div class="overflow-auto">
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-blue-700 text-white border-white">
                            <th class="px-1 py-1 mb-1">No.</th>
                            <th class="border">Nombre</th>
                            <th class="border">Usuario</th>
                            <th class="border">Celular</th>
                            <th class="border">Email</th>
                            <th class="border">Roles</th>
                            <th class="border">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($usuarios as $usuario)

                            <tr class="hover:bg-green-100 text-lg">
                                <td class="border px-1 py-1">{{($usuarios->currentpage()-1)*$usuarios->perpage()+$loop->index+1}}</td>
                                <td class="border">{{$usuario->name}}</td>
                                <td class="border">{{$usuario->usuario}}</td>
                                <td class="border">{{$usuario->celular}}</td>
                                <td class="border">{{$usuario->email}}</td>
                                <td class="border">
                                    @foreach($usuario->roles as $rol)
                                        {{$rol->name}} <br>
                                    @endforeach
                                </td>
                                <td class="border">
                                    @can('usuarios.editar')
                                        <button wire:click="editar({{$usuario->id}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-save"></i> Editar</button>
                                    @endcan

                                    @can('usuarios.eliminar')
                                        <button wire:click="alerta({{$usuario->id}})" class="bg-red-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1  rounded"><i class="fa-solid fa-trash-can"></i> Borrar</button>
                                    @endcan


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$usuarios->links()}}
        </div>
    </div>

</div>




