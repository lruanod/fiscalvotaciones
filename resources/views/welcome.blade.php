<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="images/nav.ico" />

    <!-- Styles -->
    @livewireStyles
</head>
<body  style="background-image: radial-gradient(circle at 78.26% 63.18%, #79a7ff 0, #3c66b8 50%, #052b59 100%);">
<div class="w-full mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 gap-1">
        <div>
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 px-6 py-0  sm:block mt-3 ">
                    @auth

                        <a  href="{{ url('/principal') }}" class="text-lg hover:bg-gray-500 text-white fa-beat-fade  py-1  px-1  rounded"> <i class="fa-solid fa-home">  Principal</i></a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg hover:bg-gray-500 text-white fa-beat-fade  py-1  px-1  rounded"><i class="fa-solid fa-right-to-bracket"> Ingresar</i></a>

                    @endauth
                </div>
            @endif
        </div>
        <div class="mb-4">

        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-1 sm:grid-cols-1 gap-1 mt-6">

        <div class="flex w-full justify-center items-center">
            <img src="images/home.webp" class="object-cover h-auto w-full border"/>
        </div>

    </div>


    @yield('content')
    @livewireScripts

    <script>
        Livewire.on('done', (e)=>{
            if (e.success) {
                Swal.fire({
                    icon: 'success',
                    title: e.success,
                    showConfirmButton: true,
                })
            }
            if (e.warning) {
                Swal.fire({
                    icon: 'info',
                    title: e.warning,
                    showConfirmButton: false,
                    showCancelButton: true,
                    cancelButtonColor: '#d33'
                })
            }
            if (e.error) {
                Swal.fire({
                    title: 'Esta seguro?',
                    text: 'Los cambios son irreversibles',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo(''+e.error[0]+'',''+e.error[1]+'');
                        Swal.fire(
                            'Eliminado!',
                            'Registro eliminado correctamente',
                            'success'
                        )
                    }
                })
            }
        })


    </script>
</div>
</body>

</html>
