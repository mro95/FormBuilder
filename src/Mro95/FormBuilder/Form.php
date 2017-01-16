<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormFields\FieldInterface;

class Form
{
    private $fields = [];

    private $validation = [];

    private $action = '';

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action)
    {
        $this->action = $action;
    }

    /**
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
}
