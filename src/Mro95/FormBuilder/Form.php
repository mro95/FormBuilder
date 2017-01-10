<?php namespace Mro95\FormBuilder;

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
        $this->fields[$id] = $field;
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

}
