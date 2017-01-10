<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormElements\Text;

class Form
{
    private $fields = [];

    private $validation = [];

    private $page = '';

    private $view;

    public function __construct()
    {
    }

    /**
     * @param string $id
     * @param array $field
     */
    public function addField(string $id, array $field)
    {
        unset($field['validation']);
        $this->fields[$id] = new Text($id, $field);
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
