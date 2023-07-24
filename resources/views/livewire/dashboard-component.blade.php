<div>
    <div class="px-14 py-2 bg-gradient-to-r from-black via-blue-400 bg-gray-200">
        <li class="fa-solid fa-calendar-days text-white text-2xl">  Dashboard elecciones 2023</li>
    </div>
    <div class=" mx-auto sm:px6 lg:px-8 px-5 py-5 bg-gradient-to-r from-blue-900 via-gray-700 bg-blue-900 ">
        <div class=" mx-auto sm:px6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-1 py-1">
                <div class="grid grid-cols-1 md:grid-cols-3 2xl:grid-cols-3 gap-3 ">
                    <div>
                        <label for="nombrecentro" class="text-gray-700 text-sm font-bold mb-2">Centro:</label>
                        <select id="nombrecentro" wire:model="nombrecentro" class="bg-gray-50 border border-gray-300 text-gray-700  w-full py-2 px-3 my-4 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">seleccionar</option>
                            @foreach($centros as $centro)
                                <option value="{{$centro->nombrecentro}}">{{$centro->id}}&ensp;{{$centro->nombrecentro}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="nombresector" class="text-gray-700 text-sm font-bold mb-2">Sector:</label>
                        <select id="nombresector" wire:model="nombresector" class="bg-gray-50 border border-gray-300 text-gray-700  w-full py-2 px-3 my-4 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">seleccionar</option>
                            @foreach($sectors as $sector)
                                <option value="{{$sector->nombresector}}">{{$sector->id}}&ensp;{{$sector->nombresector}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="container flex flex-col items-center py-6">
                        <button wire:click="imprimirpantalla()" title="impirmir todo" class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-3 my-4 rounded"><i class="fa-solid fa-file-pdf"></i> Imprimir</button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-1">
                    <div wire:ignore>
                        <h1 class="fa-solid text-xl">Alcalde</h1>
                        <canvas id="graficoalcalde"></canvas>
                    </div>

                    <div wire:ignore>
                        <h1 class="fa-solid text-xl">Presidente</h1>
                        <canvas id="graficopresidente"></canvas>
                    </div>

                    <div>
                        <h1 class="fa-solid text-xl mt-3 ">Tabla de votaciones para alcalde</h1>
                        <div class="overflow-auto">
                            <table class="table-auto w-full">
                                <thead>
                                <tr class="bg-blue-700 text-white border-white">
                                    <th>No.</th>
                                    <th>Partido</th>
                                    <th>Logo</th>
                                    <th>Votos</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataalcalde as $alcalde)
                                    <tr class="hover:bg-green-100">
                                        <td class="border">{{$loop->index+1}}</td>
                                        <td class="border">{{$alcalde['label']}}</td>
                                        <td class="border">
                                            <img src="{{$alcalde['logo']}}" class="h-8 w-8">
                                        </td>
                                        <td class="border">{{$alcalde['value']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div>
                        <h1 class="fa-solid text-xl mt-3 ">Tabla de votaciones para presidente</h1>
                        <div class="overflow-auto">
                            <table class="table-auto w-full">
                                <thead>
                                <tr class="bg-blue-700 text-white border-white">
                                    <th>No.</th>
                                    <th>Partido</th>
                                    <th>Logo</th>
                                    <th>Votos</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datapresidente as $presidente)
                                    <tr class="hover:bg-green-100">
                                        <td class="border">{{$loop->index+1}}</td>
                                        <td class="border">{{$presidente['label']}}</td>
                                        <td class="border">
                                            <img src="{{$presidente['logo']}}" class="h-8 w-8">
                                        </td>
                                        <td class="border">{{$presidente['value']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    @push('dashimprimir')
        <style>
            @media print {
                @page {
                    size: legal landscape;
                }
            }

            @media all {
                div.saltopagina{
                    display: none;
                }
            }

            @media print{
                div.saltopagina{
                    display:block;
                    page-break-before:always;
                }
            }
        </style>

    @endpush

    <script>
        document.addEventListener('livewire:load', function () {

            var labelsa = @json(array_column($dataalcalde, 'label'));
            var valuesa = @json(array_column($dataalcalde, 'value'));
            var colorsa = @json(array_column($dataalcalde, 'color'));

            var labelsp = @json(array_column($datapresidente, 'label'));
            var valuesp = @json(array_column($datapresidente, 'value'));
            var colorsp = @json(array_column($datapresidente, 'color'));

            Livewire.on('updateChartData', function (data) {
                updateChartData(
                    data.labelgraficaa,
                    data.valuegraficaa,
                    data.colorgraficaa,

                    data.labelgraficap,
                    data.valuegraficap,
                    data.colorgraficap,

                );
            });

            var ctxgraficaa = document.getElementById('graficoalcalde').getContext('2d');
            var graficaa = new Chart(ctxgraficaa, {
                type: 'bar',
                data: {
                    labels: labelsa,
                    datasets: [{
                        backgroundColor: colorsa,
                        data: valuesa,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each horizontal bar to be 2px wide
                    elements: {
                        bar: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            display:false
                        }
                    }
                }
            });


            var ctxgraficap = document.getElementById('graficopresidente').getContext('2d');
            var graficap = new Chart(ctxgraficap, {
                type: 'bar',
                data: {
                    labels: labelsp,
                    datasets: [{
                        backgroundColor: colorsp,
                        data: valuesp,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each horizontal bar to be 2px wide
                    elements: {
                        bar: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            display:false
                        }
                    }
                }
            });






            function updateChartData(labelgraficaa,valuegraficaa,colorgraficaa,labelgraficap,valuegraficap,colorgraficap) {

                graficaa.data.labels = labelgraficaa;
                graficaa.data.datasets[0].data = valuegraficaa;
                graficaa.data.datasets[0].backgroundColor = colorgraficaa;

                graficap.data.labels = labelgraficap;
                graficap.data.datasets[0].data = valuegraficap;
                graficap.data.datasets[0].backgroundColor = colorgraficap;

                graficaa.update();
                graficap.update();
            }



            Livewire.on('imprimirpantalla', function () {
                window.print();
            });
        });




    </script>



</div>
