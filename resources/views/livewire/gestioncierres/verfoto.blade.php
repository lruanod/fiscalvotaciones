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
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2 ">
                            @foreach($fotos as $img)
                                    <div>
                                        <img src="{{asset("storage/$img->fotoacta")}}" class="object-cover h-auto w-auto ">
                                    </div>
                                    <div>
                                        <a type="button" class="bg-blue-500 hover:bg-gray-500 text-white font-bold py-1 px-2 rounded" title="Descargar archivo" href="{{asset("storage/$img->fotoacta")}}" download="{{$img->id}}" ><i class="fa-solid fa-download"></i>
                                        </a>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                           <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="cerrarModalfoto()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                           </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
