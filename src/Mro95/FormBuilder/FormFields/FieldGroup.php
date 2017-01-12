<?php namespace Mro95\FormBuilder\FormFields;

class FieldGroup implements FieldInterface
{
    private $name = '';

    private $fields = [];

    public function __construct()
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public function addField(string $id, FieldInterface $field)
    {
        $this->fields[$id] = $field;
    }

    public function toHtml()
    {
        // TODO: Use ViewInterface
        $fieldsHtml = '';
        foreach ($this->fields as $field) {
            $fieldsHtml .= $field->toHtml();
        }
        return "<div class='fieldset'>{$fieldsHtml}</div>";
    }
}
