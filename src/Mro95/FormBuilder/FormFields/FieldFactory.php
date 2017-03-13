<?php namespace Mro95\FormBuilder\FormFields;

class FieldFactory
{
    public function createTextField(
        string $id,
        string $name,
        string $label,
        string $class = '',
        bool $required = false
    ): TextField
    {
        $field = new TextField($id,$name);
        $field->setLabel($label);
        $field->setClass($class);
        $field->setRequired($required);

        return $field;
    }
}

