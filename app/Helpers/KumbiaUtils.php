<?php

namespace App\Helpers;

class KumbiaUtils
{
    /**
     * Convierte los argumentos de un metodo de parametros por nombre a un string con los atributos
     *
     * _[Función tomada del framework KumbiaPHP de la clase Tag]_
     * @param string|array $params argumentos a convertir
     * @return string
     */
    public static function getAttrs($params): string
    {
        if (!is_array($params)) {
            return (string)$params;
        }
        $data = '';
        foreach ($params as $k => $v) {
            $data .= "$k=\"$v\" ";
        }
        return trim($data);
    }

    /**
     * Crea un enlace usando la constante PUBLIC_PATH, para que siempre funcione.
     *
     * _[Función tomada del framework KumbiaPHP de la clase Html]_
     * @example <?= Html::link('usuario/crear','Crear usuario') ?>
     * @example Imprime un enlace al controlador usuario y a la acción crear, con el texto 'Crear usuario'
     * @example <?= Html::link('usuario/crear','Crear usuario', 'class="button"') ?>
     * @example El mismo anterior, pero le añade el atributo class con valor button
     *
     * @param string $action Ruta a la acción
     * @param string $text Texto a mostrar
     * @param string|array $attrs Atributos adicionales
     *
     * @return string
     */
    public static function link($action, $text, $attrs = ''): string
    {
        if (is_array($attrs)) {
            $attrs = self::getAttrs($attrs);
        }

        return '<a href="' . asset('') . "$action\" $attrs>$text</a>";
    }

    /**
     * Permite incluir una imagen, por defecto va la carpeta public/img/
     *
     * @example <?= Html::img('logo.png','Logo de KumbiaPHP') ?>
     * @example Imprime una etiqueta img <img src="/img/logo.png" alt="Logo de KumbiaPHP">
     * @example <?= Html::img('logo.png','Logo de KumbiaPHP', 'width="100px" height="100px"') ?>
     * @example Imprime una etiqueta img <img src="/img/logo.png" alt="Logo de KumbiaPHP" width="100px" height="100px">
     *
     * @param string $src Ruta de la imagen a partir de la carpeta public/img/
     * @param string $alt Texto alternativo de la imagen.
     * @param string|array $attrs Atributos adicionales
     *
     * @return string
     */
    public static function img(string $src, string $alt = '', string|array $attrs = ''): string
    {
        // return '<img src="'.PUBLIC_PATH."img/$src\" alt=\"$alt\" ".Tag::getAttrs($attrs).'/>';
        return '<img src="' . asset("/img/$src") . '" alt="' . $alt . '"' . self::getAttrs($attrs) . '/>';
    }
}
