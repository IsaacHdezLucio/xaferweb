@use(App\Helpers\Htmlbs)
@use(App\Helpers\KumbiaUtils)

{{-- Esta es la plantilla base, se llama desde otro archivo usando extends('layouts.master') --}}
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

<div @style(['position: relative; display: inline-block;'])>
    <?= KumbiaUtils::img('character_2.png', 'Sheryl', ['style' => 'width: 100%; height: auto;']) .
    Htmlbs::btnHtml('Haz clic aquí', [
        'style' => ' position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%); background-color: #0000007F;
            color: white; border: none; padding: 10px 20px; cursor: pointer; font-size: 16px;',
        'onmouseover' => 'this.style.backgroundColor=\'#000000CC\'',
        'onmouseout' => 'this.style.backgroundColor=\'#0000007F\''
    ]) ?>
</div>

{{-- Sección footer --}}
@include('partials.master.footer')
</body>
</html>

