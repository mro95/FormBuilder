<?php namespace Mro95\FormBuilder\FormFields;

class FieldFactory
{
    public function createTextField(string $name, bool $required = false): TextField
    {
        $field = new TextField($name);
        $field->setRequired($required);

        return $field;
    }
}

