<?php namespace Mro95\FormBuilder\Translator;
interface TranslatorInterface
{
    public function trans(string $id, $parameters = []);
}
