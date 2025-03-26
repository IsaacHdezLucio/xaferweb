<!-- Sección donde se cargan los recursos principales -->
@use(App\Helpers\Htmlbs)
@use(App\Helpers\KumbiaUtils)

<!-- Se declara un extensión de master y se define el titulo de esta pagina -->
@extends('layouts.master')
@section('title', 'Pagina principal')

<!-- Sección donde se mostrará el contenido -->
@section('content')
    <div @style(['text-align: center'])>
        Hero Section
        <hr @style(['color: rgb(0, 0, 0, 0.5); padding-bottom: 1px; width: 50%;'])>
        <span @style(['font-size: 100px; padding-top: 0px;'])>[Imagenes XAFER]</span>
        <div>
            menu opciones
            <div @style(['display: flex; justify-content: space-between;'])>
                <div @style(['padding: 50px'])>
                    Pestaña/Botón de productos
                </div>
                <div @style(['padding: 50px'])>
                    Pestaña/Botón de productos
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
            est
            laborum.
        </p>
        <?php
        function attrs(array|string $values): string
        {
            return KumbiaUtils::getAttrs($values);
        }
        function btnSlider(string $texto): string
        {
            $estilo = 'position: absolute; top: 50%; transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5); color: white; border: none;
        font-size: 24px; padding: 10px; cursor: pointer; height: 30%;';

            if ($texto == '&#10094;') // Izquierda
                return Htmlbs::btnHtml($texto, [
                    'style' => "{$estilo} left: 10px;",
                    'onclick' => 'moverSlide(-1)'
                ]);
            elseif ($texto == '&#10095;') // Derecha
                return Htmlbs::btnHtml($texto, ['class' => 'overlay-btn',
                    'style' => "{$estilo} right: 10px;",
                    'onclick' => 'moverSlide(1)'
                ]);
            return '';
        }
        $gal = ['sl-1', 'sl-11', 'sl-32', 'sl-33', 'sl-v', 'sl-vxl'];
        ?>
        <style>
            .overlay-btn:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }
        </style>
        <!-- Sección para el carrusel de imagenes -->
        <h1 @style(['text-align: center'])>Linea de productos</h1>
        <hr>
        <div @style(['justify-content: center; align-items: center'])>
            <div @style(['position: relative; width: 600px; margin: auto; overflow: hidden;'])>
                <div @class(['carrusel']) @style(['display: flex; transition: transform 0.5s ease;']) >
                    @foreach($gal as $im)
                        <div @class(['slide']) @style(['min-width: 100%; transition: opacity 0.5s ease;'])>
                                <?= KumbiaUtils::img("valvulas/$im.png", 'Valvula ' . strtoupper($im), [
                                'style' => 'width:100%; height: auto;']) ?>
                            <h3 @style(['text-align: center'])>Valvulas <?= strtoupper($im); ?></h3>
                        </div>
                    @endforeach
                </div><?= btnSlider('&#10094;') . btnSlider('&#10095;') ?>
            </div>
            <hr>
        </div>
        <script type="text/javascript">
            let index = 0;

            function moverSlide(n) {
                const slides = document.querySelectorAll('.slide');
                index += n;

                if (index < 0) {
                    index = slides.length - 1;
                } else if (index >= slides.length) {
                    index = 0;
                }
                const carrusel = document.querySelector('.carrusel');
                carrusel.style.transform = `translateX(-${index * 100}%)`;
            }
        </script>
    </div>
@endsection
