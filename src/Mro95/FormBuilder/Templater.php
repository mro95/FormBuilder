<?php namespace Mro95\FormBuilder;

class Templater
{
    public static function render(string $path, array $vars)
    {
        extract($vars);
        ob_start();
        include $path;
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}