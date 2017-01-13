<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormFields\FieldInterface;

class Form
{
    private $fields = [];

    private $validation = [];

    public function __construct()
    {
    }

    /**
     * @param string $id
     * @param FieldInterface $field
     */
    public function addField(FieldInterface $field)
    {
        $this->fields[] = $field;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function addValidationRule($id, $rule)
    {
        if(!empty($rule) && is_array($rule)) {
            $this->validation[$id] = $rule;
        }
    }

    public function toHtml()
    {
        $out = '';
        foreach ($this->fields as $field) {
            $out .= $field->toHtml();
        }
        return $out;
    }

}
