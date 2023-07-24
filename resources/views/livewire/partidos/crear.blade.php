<div  class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="mb-4">
                        <label for="tipopartido" class="text-gray-700 text-sm font-bold mb-2">Tipo de partido*:</label>
                        <select id="tipopartido" wire:model="tipopartido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">seleccionar</option>
                            <option value="Alcalde">Alcalde</option>
                            <option value="Presidente">Presidente</option>
                        </select>
                        @error('tipopartido')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nombrepartido"  class="text-gray-700 text-sm font-bold mb-2">Nombre del partido*</label>
                        <input id="nombrepartido" wire:model="nombrepartido" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta" ></input>
                        @error('nombrepartido')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="fotopartido"  class="text-gray-700 text-sm font-bold mb-2">Fotografía del partido</label>
                        <input id="{{$identificador}}"  wire:model="fotopartido"  multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="file"    ></input>
                        @error('fotopartido')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div wire:loading wire:target="fotopartido" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <ul>
                                <li class="text-black">Espere un momento hasta que la imagen se haya cargado</li>
                            </ul>
                        </div>
                        @if ($fotopartido)
                            <label  class="text-gray-700 text-lg font-bold mb-3" >Previsualización</label><br>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
                                @foreach($fotopartido as $key => $image)
                                    <div>
                                        <img class="object-contain h-48 w-96 mb-3" src="{{$image->temporaryUrl()}}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
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
