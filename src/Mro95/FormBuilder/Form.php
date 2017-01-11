<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormElements\Fieldset;
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
        if ($field['type'] == 'fieldset') {
            $fieldset = new Fieldset();
            foreach ($field['fields'] as $subFieldID => $subField) {
                $text = new Text($subFieldID, $subField);
                $fieldset->addField($subFieldID, $text);
            }
            $this->fields[$id] = $fieldset;
        } elseif ($field['type'] == 'text') {
            $this->fields[$id] = new Text($id, $field);
        }
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
