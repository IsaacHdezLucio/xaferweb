<!-- Importación y carga de variables  -->
@use(App\Helpers\Htmlbs;use App\Helpers\KumbiaUtils)
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
        font-size: 10px;
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
        <div @style(['display: flex; justify-content: center; align-items: center'])>
            <a @style(["{$dev};", 'padding: 0.1em; margin-right: 20px;']) href="{{asset('')}}">
                <?= KumbiaUtils::img('Xaferlogo.jpg', 'Xafer', 'style="height: 65px; width: auto"') ?>
            </a>
            <!-- Menú Despegable -->
            <div @style(['text-align: center; align-items: center;'])>
                <details @style(["position: relative; z-index: 10; border: 2px solid #00f000; border-radius: 8px; padding: 5px; background-color: #00f000; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"])>
                    <!-- Estilo del resumen (título del menú) -->
                    <summary @style(['font-size: 16px; font-weight: bold; color: white; padding: 10px; cursor: pointer; background-color: #009e47; border-radius: 8px; transition: background-color 0.3s;'])>
                        Navegación
                    </summary>
                    <!-- Contenido del menú -->
                    <div @style(['display: flex; flex-direction: row; align-items: center; position: absolute; top: 100%; left: 0; background-color: #00f000; padding: 5px; max-height: 200px; overflow-y: auto; width: auto /*100%*/; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: max-height 0.3s ease;'])
                        {{----}}>
                        @foreach([['Inicio', ''], ['Productos', 'productos'], ['Servicios', '#']] as $nav)
                            <p @style(['margin: 5px; position: relative; z-index: 20;'])>
                                    <?= KumbiaUtils::link($nav[1], $nav[0], [
                                        'style' => 'color: white; padding: 10px; text-decoration: none; transition: background-color 0.3s;',
                                    ]
                                // 'style="color: white; padding: 10px; text-decoration: none; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor=\'#007f3d\'" onmouseout="this.style.backgroundColor=\'#00f000\'"'
                                ) ?>
                            </p>
                        @endforeach
                    </div>
                </details>
            </div>
        </div>
        <!--<div>

        </div>-->
        <div>
            <?= Htmlbs::btnHtml('Lista de deseados', [
                'style' => 'text-decoration: none; padding: 20px 30px;
                    background-color: #4CAF50; color: white;
                    border: none; border-radius: 5px; cursor: pointer;',
                'onmouseover' => 'this.style.backgroundColor=\'#45a049\'',
                'onmouseout' => 'this.style.backgroundColor=\'#4CAF50\'', // Añadido para restaurar el color cuando el mouse se va
                'onclick' => 'this.style.backgroundColor=\'#3e8e41\'' // Cambia el color cuando se hace clic

            ]) ?>

            <?= Htmlbs::btnHtml('Iniciar Sesión', [
                'style' => 'text-decoration: none; padding: 20px 30px;
                    background-color: #4CAF50; color: white;
                    border: none; border-radius: 5px; cursor: pointer;',
                'onmouseover' => 'this.style.backgroundColor=\'#45a049\'',
                'onmouseout' => 'this.style.backgroundColor=\'#4CAF50\'', // Añadido para restaurar el color cuando el mouse se va
                'onclick' => 'this.style.backgroundColor=\'#3e8e41\'' // Cambia el color cuando se hace clic

            ]) ?>
        </div>
    </div>
</nav>
