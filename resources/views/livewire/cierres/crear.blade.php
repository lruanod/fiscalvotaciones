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
                        <label for="acta_id" class="text-gray-700 text-sm font-bold mb-2">No.acta{{$acta_id}}</label>
                    </div>

                    <div class="mb-4">
                        <label for="selecttipo" class="text-gray-700 text-sm font-bold mb-2">Tipo de partido*:</label>
                        <select id="selecttipo" wire:model="selecttipo"  wire:change="addacta()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">seleccionar</option>
                            <option value="Alcalde">Alcalde</option>
                            <option value="Presidente">Presidente</option>
                        </select>
                        @error('selecttipo')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="numeromesa"  class="text-gray-700 text-sm font-bold mb-2">Numero de mesa*</label>
                        <input id="numeromesa" wire:model="numeromesa" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta" readonly="readonly" ></input>
                        @error('numeromesa')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="votosasignados"  class="text-gray-700 text-sm font-bold mb-2">Numero de votos asignados*</label>
                        <input id="votosasignados" wire:model="votosasignados" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta"  readonly="readonly"></input>
                        @error('votosasignados')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="partido_id" class="text-gray-700 text-sm font-bold mb-2">Partidos registrados</label> <br>
                        <div class="grid grid-cols-3 md:grid-cols-3 sm:grid-cols-3 gap-3">
                          @foreach($partidos as $partido)
                                @php($conn=0)
                            @foreach($cierres as $cierre)
                                @if($cierre->partido_id == $partido->id)
                                    @php($conn=1)
                                    <div>
                                        <label class="text-gray-700 text-sm font-bold text-center">{{$cierre->partido->id}}&ensp;{{$cierre->partido->nombrepartido}}&ensp;Cargo:&ensp;{{$cierre->partido->tipopartido}}</label>
                                    </div>
                                    <div>
                                        <input type="number" value="{{$cierre->conteovotos}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta"  readonly="readonly" ></input>
                                    </div>
                                    <div>
                                        <button wire:click.prevent="alerta({{$cierre->cierre_idd}})" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 mb-1 rounded"> <i class="fa-solid fa-save"></i></button>
                                    </div>
                                 @endif

                            @endforeach
                                @if($conn==0)
                                    <div>
                                        <label class="text-gray-700 text-sm font-bold text-center">{{$partido->id}}&ensp;{{$partido->nombrepartido}}&ensp;Cargo:&ensp;{{$partido->tipopartido}}</label>
                                    </div>
                                    <div>
                                        <input wire:model.defer="conteovotos" id="{{$randoncierre.$partido->id}}"  wire:change="addcierre({{$partido->id}})" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta" ></input>
                                    </div>
                                    <div>

                                    </div>
                                @endif
                          @endforeach
                              <div >

                              </div>

                            <div class="border border-gray-400">
                                Total
                            </div>
                            <div class="border border-gray-400">
                                <input id="total" wire:model="total" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta" readonly="readonly" ></input>
                                @error('total')
                                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                    <p class="font-bold">Error</p>
                                    <p>{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                              <div>

                              </div>
                            <div class="border border-gray-400">
                                    Diferencia
                            </div>
                            <div class="border border-gray-400">
                                <input id="diferencia" wire:model="diferencia" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu respuesta" readonly="readonly" ></input>
                                @error('diferencia')
                                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                    <p class="font-bold">Error</p>
                                    <p>{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mb-4">
                        <label for="fotoacta"  class="text-gray-700 text-sm font-bold mb-2">Fotografía del acta</label>
                        <input id="{{$identificador}}"  wire:model="fotoacta"  multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="file"    ></input>
                        @error('fotoacta')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div wire:loading wire:target="fotoacta" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <ul>
                                <li class="text-black">Espere un momento hasta que la imagen se haya cargado</li>
                            </ul>
                        </div>
                        @if ($fotoacta)
                            <label  class="text-gray-700 text-lg font-bold mb-3" >Previsualización</label><br>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
                                @foreach($fotoacta as $key => $image)
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
