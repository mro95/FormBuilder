<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormFields\FieldInterface;

class FormBuilder
{
    private $fields = [];

    public function addField(FieldInterface $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public function build(): Form
    {
        $form = new Form();

        foreach ($this->fields as $field) {
            $form->addField($field);
        }

        return $form;
    }


}
