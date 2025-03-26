@use(App\Helpers\KumbiaUtils)
@php
    $dev = ['border: 1px solid #000'];
    $despegable = ['Inicio', 'Productos', 'Servicios', 'Lista de deseos']
@endphp

<nav @style(['background-color: #009e47; display: flex'])>
    <div @style([$dev[0], 'margin: 0 20px 0 0; padding: 1em'])>
        Logo Xafer
    </div>
    <div @style([$dev[0], 'text-align: center'])>
        Menú despegable
        <div @style([$dev[0], 'text-align: center; display: flex'])>
            @foreach($despegable as $desp)
                    <?= KumbiaUtils::link('#', $desp, ['style' => "{$dev[0]}; display: block; margin: 5px 5px;"]) ?>
            @endforeach
            {{--@for($i = 1; $i <= 10; $i++)
                <div @style([$dev[0], 'text-align: center', 'display: inline-block'])>
                    <?= KumbiaUtils::link('#', "Producto $i", ['style' => "$dev[0]; display: block; margin: 1px 0;"]) ?>
            @endfor--}}
        </div>
    </div>
    <div @style([$dev[0], 'margin: 0 0 0 20px; padding: 1em'])>
        Links a redes sociales
    </div>
    <div @style([$dev[0], 'margin: 0 0 0 20px; padding: 1em'])>
        Botones para inicio de sesión
    </div>
</nav>
