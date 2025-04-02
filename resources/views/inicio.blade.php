<!-- Sección donde se cargan los recursos principales -->
@use(App\Helpers\Htmlbs)
@use(App\Helpers\KumbiaUtils)

<!-- Se declara un extensión de master y se define el titulo de esta pagina -->
@extends('layouts.master' )
@section('title', 'Pagina principal')

<style>
    * {
        font-size: 110%;
    }
    @php
        $px = 110;
            $parrafos_stylo = ["margin-left: {$px}px; margin-right: {$px}px"];
    @endphp
</style>

<!-- Sección donde se mostrará el contenido -->
@section('content')
    <div @style(['text-align: center'])>
        <!-- Hero Section -->
        <hr @style(['color: rgb(0, 0, 0, 0.5); padding-bottom: 1px; width: 50%;'])>
        <div @style(['position: relative; height: 250px; overflow: hidden; display: flex; justify-content: center; align-items: center; '])>
        <span @style(['display: block; width: 100%;'])>
            <?= KumbiaUtils::img('OIP.jpg', '[Imagenes XAFER]', ['style' => 'width: 100%; height: auto; display: inline; filter: blur(5px);']) ?>
        </span>
        </div>
        <div>
            <!-- Menú de opciones -->
            <div @style(['display: flex; justify-content: space-between;'])>
                @php
                    $texto = ['Servicios', 'Productos'];
                @endphp
                @for($i = 1; $i <= 2; $i++)
                    <div @style(['padding: 50px'])>
                            <?= KumbiaUtils::link('productos', $texto[$i - 1], [
                            'style' => 'text-decoration: none; padding: 20px 30px;
                                        background-color: #4CAF50; color: white;
                                        border: none; border-radius: 5px; cursor: pointer;',
                            'onmouseover' => 'this.style.backgroundColor=\'#45a049\'',
                            'onmouseout' => 'this.style.backgroundColor=\'#4CAF50\'', // Añadido para restaurar el color cuando el mouse se va
                            'onclick' => 'this.style.backgroundColor=\'#3e8e41\'' // Cambia el color cuando se hace clic
                        ]) ?>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <hr>
    <!-- Sección de los productos -->
    <div>
        <div id="historia" @style(['text-align: center;'])>
            <h3>HISTORIA</h3>
            <p @style($parrafos_stylo)>
                XAFER nace el 30 de mayo de 2016, se crea por el crecimiento de la Industria y por la preferencia de
                nuestros
                clientes, además de implementar grandes alcances técnicos y comerciales aunados a un servicio
                profesional
                con más de 20 años de experiencia en la rama de productos y servicios.
            </p>
        </div>
        <hr>
        <?php
        function attrs(array|string $values): string
        {
            return KumbiaUtils::getAttrs($values);
        }

        function btnSlider(string $texto): string
        {
            $config = [];  // Inicializa el arreglo con valores vacíos

            if ($texto == '&#10094;') { // Izquierda
                $config[0] = 'left: 0';
                $config[1] = -1;
            } elseif ($texto == '&#10095;') { // Derecha
                $config[0] = 'right: 0';
                $config[1] = 1;
            } else
                return '';

            // Retorna el botón dependiendo de la figura
            return Htmlbs::btnHtml($texto, [
                'style' => "background-color: #FFF000; background-color: #0000007F; color: white; border: none;
                    font-size: 24px; padding: 10px; cursor: pointer; height: 90%;
                    position: absolute; top: 50%; transform: translateY(-50%); $config[0];",
                'onclick' => "moverSlide($config[1])",
                'onmouseover' => 'this.style.backgroundColor =\'#000000CC\'',
                'onmouseout' => 'this.style.backgroundColor =\'#0000007F\''
            ]);
        } ?>
            <!-- Sección para el carrusel de imagenes -->
        <h1 @style(['text-align: center; font-size:400%;'])>Linea de productos</h1>

        <!-- Botones e imagenes -->
        <div @style(['justify-content: space-between; position: relative;'])>
            <hr>
            <div @style(['justify-content: center; align-items: center; position: relative;'])>
                <!-- Botón Izquierda -->
                <?= btnSlider('&#10094;') ?>
                <div @style(['position: relative; width: 600px; margin: auto; overflow: hidden;'])>
                    <div @class(['carrusel']) @style(['display: flex; transition: transform 0.5s ease;']) >
                        @foreach(['sl-1', 'sl-11', 'sl-32', 'sl-33', 'sl-v', 'sl-vxl'] as $im)
                            <div @class(['slide']) @style(['min-width: 100%; transition: opacity 0.5s ease;'])>
                                    <?= KumbiaUtils::img("valvulas/$im.png", 'Valvula ' . strtoupper($im), [
                                    'style' => 'width:100%; height: auto;']) ?>
                                <h3 @style(['text-align: center'])>Valvulas <?= strtoupper($im); ?></h3>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Botón Derecho -->
                <?= btnSlider('&#10095;') ?>
            </div>
            <hr>
        </div>
        <div @style(['padding-bottom: 120px; text-align: center']) id="acercade">
            <h3>VISIÓN</h3>
            <p @style($parrafos_stylo)>
                Ser una empresa de excelencia en lubricación y automatización siendo una de las más avanzadas para ser
                la
                mejor opción de nuestros clientes en sus requerimientos, ser competitivos aplicando la fortaleza de
                nuestros
                valores para lograr una imagen social y técnica altamente reconocida.
            </p>
            <h3>MISIÓN</h3>
            <p @style($parrafos_stylo)>
                Proporcionar productos y servicios de calidad buscando siempre la satisfacción del cliente, teniendo en
                cuenta
                el medio ambiente, ecología y Certificaciones de servicios, cumpliendo los más estrictos estándares de
                calidad.
            </p>
            <h3>POLÍTICA DE CALIDAD</h3>
            <p @style($parrafos_stylo)>
                En XAFER estamos comprometidos con el cumplimiento de los requerimientos y las necesidades de nuestros
                clientes, superando sus expectativas a través de un proceso de mejora continua de nuestro sistema de
                gestión
                de calidad basado en la norma ISO 9000:2008.
            </p>
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
