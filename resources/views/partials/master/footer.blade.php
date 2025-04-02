@use(App\Helpers\KumbiaUtils)
@php($dev = ['border: 1px solid #000'])

<footer
    id="footer" @style(['background-color: #009e47; display: flex; position: fixed; bottom: 0; left: 0; width: 100%; justify-content: space-between'])>

    <div @style(['margin: 0 20px 0 0; padding: 1em; margin: 10px 10px'])>
        <?= KumbiaUtils::link('/#historia', 'Sobre nosotros', [
            'style' => 'text-decoration: none; padding: 20px 30px;
            background-color: #4CAF50; color: white;
            border: none; border-radius: 5px; cursor: pointer;',
            'onmouseover' => 'this.style.backgroundColor=\'#45a049\'',
            'onmouseout' => 'this.style.backgroundColor=\'#4CAF50\'', // Añadido para restaurar el color cuando el mouse se va
            'onclick' => 'this.style.backgroundColor=\'#3e8e41\''
        ]) ?>
    </div>
    <div @style([$dev[0], 'margin: 0 20px 0 0; padding: 1em; margin: 10px 10px'])>
        Link de redes sociales
    </div>

</footer>

<style>
    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: white;
        padding: 20px;
        transition: transform 0.3s ease;
        transform: translateY(0); /* El footer se muestra completamente */
    }

    #footer.minimized {
        transform: translateY(100%); /* El footer se oculta */
    }
</style>

<script type="text/javascript">
    window.addEventListener('scroll', function () {
        const footer = document.getElementById('footer');
        const scrollPosition = window.scrollY + window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;

        // Si estamos al final de la página, mostrar el footer
        if (scrollPosition === documentHeight) {
            footer.classList.remove('minimized');
        } else {
            footer.classList.add('minimized');
        }
    });
</script>
