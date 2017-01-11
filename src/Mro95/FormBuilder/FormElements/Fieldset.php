<?php namespace Mro95\FormBuilder\FormElements;

class Fieldset
{
    private $fields = [];

    public function addField(string $id, FormElement $field)
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
