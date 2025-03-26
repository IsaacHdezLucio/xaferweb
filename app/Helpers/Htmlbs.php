<?php

namespace App\Helpers;

class Htmlbs
{
    protected static function attrsDefault($attrs, $default)
    {
        foreach ($default as $k => $v):
            if (isset($attrs[$k])):
                if (strpos($attrs[$k], $v) === false):
                    $attrs[$k] .= ' ' . $v;
                endif;
            else:
                $attrs[$k] = $v;
            endif;
        endforeach;
        return $attrs;
    }

    /**
     * Función para generar un botón estilizado a partir de una etiqueta `<a>`.
     * @param string $msg Es el mensaje que contendrá el "Botón".
     * @param string $link Esta es la ruta a la que va a redireccionar.
     * @param array|string $attrs ¿No te agrada el diseño por defecto? Con esta variable puedes modificar el estilo a tu gusto o agregar más elementos.
     * @return string
     */
    public static function btnLink(string $msg, string $link = '#', array|string $attrs = []): string
    {
        if (is_array($attrs) and empty($attrs)) $attrs = Htmlbs::attrsDefault($attrs, ['class' => 'btn btn-primary']);
        else $attrs = Htmlbs::attrsDefault($attrs, []);

        return KumbiaUtils::link($link, $msg, $attrs);
    }

    public static function btnHtml(string $texto, string|array $attrs = ''): string
    {
        return '<button ' . KumbiaUtils::getAttrs($attrs) . '>' . $texto . '</button>';
    }
}
