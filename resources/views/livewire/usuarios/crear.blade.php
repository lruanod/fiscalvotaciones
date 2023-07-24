<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <label for="name"  class="text-gray-700 text-sm font-bold mb-2">Nombre</label>
                        <input id="name" wire:model.defer="name"  type="text" class="shadow appearance-none rounded  w-full py-2 px-3 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre" >
                        @error('name')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="usuario"  class="text-gray-700 text-sm font-bold mb-2">Usuario</label>
                        <input id="usuario" wire:model.defer="usuario"  type="text" class="shadow appearance-none rounded  w-full py-2 px-3 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="Usuario" >
                        @error('usuario')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="celular"  class="text-gray-700 text-sm font-bold mb-2">No. celular</label>
                        <input id="celular" wire:model.defer="celular"  type="number" class="shadow appearance-none rounded  w-full py-2 px-3 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="No. DPI" >
                        @error('celular')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="email"  class="text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input id="email" wire:model.defer="email"  type="email" class="shadow appearance-none rounded  w-full py-2 px-3 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline" placeholder="tu_correo@gmail.com" >
                        @error('email')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password"  class="text-gray-700 text-sm font-bold mb-2">Contraseña por defecto</label>
                        <input id="password" wire:model.defer="password"  type="password" class="shadow appearance-none rounded  w-full py-2 px-3 text-gray-700 bg-gray-50 leading-tight focus:outline-none focus:shadow-outline">
                        @error('password')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="text-gray-700 text-sm font-bold mb-2">Rol</label><br>
                        @foreach($roles as $rol)
                                <input  id="role_us" type="checkbox" wire:model.defer="role_us" value="{{$rol}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="role_us" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$rol}}</label><br>
                        @endforeach
                        @error('role_us')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror

                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="guardar()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                            </span>

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                            </span>
                    </div>

                </div>
            </form>
        </div>


    </div>
</div>
