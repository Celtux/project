<?php

namespace App\Acf\Fields;

class Link
{
    public static function render_acf_link ( array $link, string $class = "", $icon = "", $span_class = "", $span_content = "", $atrib = ""):string {
        if (!$link) return '';

        $attr = 'href="' . $link['url'] .'"';

        if ($link['target']) $attr .= ' target="_blank"';
        if ($class) $attr .= ' class="' . $class . '"';
        if ($atrib) $attr .= ' download';

        $output = '<a ' . $attr . '>';
        $output .= $icon;
        $output .= $link['title'];
        $output .= '<span class="' . $span_class . '"></span></a>';

        return $output;
    }
}

