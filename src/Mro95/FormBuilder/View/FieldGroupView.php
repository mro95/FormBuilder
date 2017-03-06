<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\FieldGroup;

class FieldGroupView implements FieldView
{
    protected $fieldGroup;

    public function __construct(FieldGroup $fieldGroup)
    {
        $this->fieldGroup = $fieldGroup;
    }

    public function render()
    {
        $output = '<div class="form-group">';
        foreach ($this->fieldGroup->getFields() as $field) {
            $output .= (new TextFieldView($field))->render();
        }
        $output .= '</div>';
        return $output;
    }
}
