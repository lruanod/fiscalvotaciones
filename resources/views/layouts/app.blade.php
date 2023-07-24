<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="shortcut icon" href="images/nav.ico" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('dashimprimir')

    <!-- Styles -->
    @livewireStyles

</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-gradient-to-r from-blue-700 via-gray-300 bg-blue-700">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
<script>
    Livewire.on('done', (e)=>{
        if (e.success) {
            Swal.fire({
                icon: 'success',
                title: e.success,
                showConfirmButton: false,
                timer: 1500
            })
        }
        if (e.warning) {
            Swal.fire({
                icon: 'info',
                title: e.warning,
                showConfirmButton: false,
                timer: 1500
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


</body>
</html>
