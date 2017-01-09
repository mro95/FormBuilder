<?php namespace Mro95\FormBuilder;

class Form
{
    private $fields = [];

    private $validation = [];

    private $page = '';

    private $view;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
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

    public function addValidationRule($id, array $rule)
    {
        $this->validation[$id] = $rule;
    }

    private function formatText($id, $input)
    {
        $wrapper = $input['wrapper'] ?? true;
        $fields = view("form.text", compact('id', 'input'))->render();
        if ($wrapper === true) {
            $fieldSet = $this->addFieldset($id, $input, $fields);
            $view = $fieldSet;
        } else {
            $view = $fields;
        }
        return $view;
    }

    private function formatRadio($id, $form)
    {
        $options = $form['options'];
        $name = isset($form['name']) ? trans($form['name']) : $id;
        $form['class'] = $form['class'] ?? '';
        $required = $form['validation']['required'] ?? false;
        if ($required === true) {
            $form['class'] .= ' required';
        }
        $view = view("form.radio", compact('id', 'form', 'options', 'name'))->render();
        return $view;
    }

    private function formatFieldset($id, $form, $fields = null)
    {
        $label = $form;
        $label['id'] = $id;
        $label['class'] = $label['class'] ?? '';
        $label['name'] = isset($form['name']) ? trans($form['name']) : null;
        $required = $label['validation']['required'] ?? false;
        if ($required === true) {
            $label['class'] .= ' required';
        }
        $fields = $fields ?? $this->formatElements($form['fields']);
        return view('form.fieldset', compact('fields', 'label'))->render();
    }

    private function formatElements($elements)
    {
        foreach ($elements as $id => $form) {
            $type = $form['type'];
            $addFunction = "add" . ucfirst($type);
            $this->$addFunction($id, $form);
        }
    }

    public function formatPage()
    {

    }
}
