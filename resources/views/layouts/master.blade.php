@use(App\Helpers\Htmlbs)
@use(App\Helpers\KumbiaUtils)

<!-- Esta es la plantilla base, se llama desde otro archivo usando extends('layouts.master') -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{Htmlbs::laravelIcon()}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- El titulo de la pagina usa un estandar, por lo que hay que cambiarlo si se crea una nueva pagina -->
    <title>XAFER | @yield('title', 'Layout')</title>

    {{-- Sección para cargar estilos CSS --}}
    @include('partials.estilos')

</head>
<body>
{{-- Sección Navbar --}}
@include('partials.master.navbar')
{{-- Aquí se renderiza el contenido de la pagina --}}
@yield('content')


<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .image {
        width: 100%; /* O el tamaño que desees */
        height: auto;
    }

    .overlay-button {
        position: absolute;
        top: 50%; /* Centra el botón verticalmente */
        left: 50%; /* Centra el botón horizontalmente */
        transform: translate(-50%, -50%); /* Ajusta el botón para que se quede centrado */
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente (opcional) */
        color: white; /* Color del texto */
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    .overlay-button:hover {
        background-color: rgba(0, 0, 0, 0.8); /* Cambia color al pasar el mouse (opcional) */
    }
</style>


<div class="image-container">
    <?= KumbiaUtils::img('character_2.png', 'Sheryl', ['class' => 'image']) .
    Htmlbs::btnHtml('Haz clic aquí', 'class="overlay-button"') ?>
</div>


{{-- Sección footer --}}
@include('partials.master.footer')
</body>
</html>


{{--
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>XAFER | @yield('title', 'Layout')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Aquí va una etiqueta <style> pero no la voy a poner porque son casi como 1500 lineas de código y la verdad estorban -->
        @include('partial.laravel')
    @endif
</head>
<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
@yield('content')


@if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
@endif
</body>
</html>

--}}
