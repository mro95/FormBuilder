<?php namespace Mro95\FormBuilder\FormFields;

class FieldFactory
{
    public function createTextField(
        string $name,
        string $class = '',
        bool $required = false
    ): TextField
    {
        $field = new TextField($name);
        $field->setClass($class);
        $field->setRequired($required);

        return $field;
    }
}

