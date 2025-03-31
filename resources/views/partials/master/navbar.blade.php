<!-- Importación y carga de variables  -->
@use(App\Helpers\KumbiaUtils)
@php($dev = 'border: 1px solid #000')

<!-- Estilos -->
<style>
    .main-nav {
        background-color: #009e47;
        display: flex;
        flex-direction: column;
        padding: 10px;
        justify-content: space-between;
        position: relative;
    }

    .main-div-1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
</style>

<!-- Aquí empieza el navbar -->
<nav class="main-nav">
    <!-- Sección del logo -->
    <div class="main-div-1">
        <a @style(["{$dev};", 'padding: 0.1em; margin-right: 20px;']) href="{{asset('')}}">
            <?= KumbiaUtils::img('Xaferlogo.jpg', 'Xafer', 'style="height: 65px; width: auto"') ?>
        </a>
        <!-- Menú Despegable -->
        <div @style(['text-align: center'])>
            <details @style(["position: relative; z-index: 10; border: 2px solid #00f000; border-radius: 8px; padding: 5px; background-color: #00f000; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"])>
                <!-- Estilo del resumen (título del menú) -->
                <summary @style(['font-size: 16px; font-weight: bold; color: white; padding: 10px; cursor: pointer; background-color: #009e47; border-radius: 8px; transition: background-color 0.3s;'])>
                    Navegación
                </summary>
                <!-- Contenido del menú -->
                <div @style(['display: flex; flex-direction: row; align-items: center; position: absolute; top: 100%; left: 0; background-color: #00f000; padding: 5px; max-height: 200px; overflow-y: auto; width: 100%; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: max-height 0.3s ease;'])
                    {{----}}>
                    @foreach([['Inicio', ''], ['Productos', 'productos'], ['Servicios', '#'], ['Lista de deseos', '#']] as $nav)
                        <p @style(['margin: 5px; position: relative; z-index: 20;'])>
                                <?= KumbiaUtils::link($nav[1], $nav[0], 'style="color: white; padding: 10px; text-decoration: none; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor=\'#007f3d\'" onmouseout="this.style.backgroundColor=\'#00f000\'"') ?>
                        </p>
                    @endforeach
                </div>
            </details>
        </div>
        <div></div>
        <div></div>
    </div>
</nav>
