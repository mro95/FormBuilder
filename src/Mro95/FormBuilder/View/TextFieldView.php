<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\TextField;

class TextFieldView implements FieldView
{
    private $field;

    public function __construct(TextField $textField)
    {
        $this->field = $textField;
    }

    /**
     * Get the properties for the field.
     *
     * @return array
     */
    public function getProperties(): array
    {
        $field = $this->field;

        $properties = [];

        //ID
        if ($field->getId() !== '') {
            $properties[] = "id='{$field->getId()}'";
        }

        // Name
        $properties[] = "name='{$field->getName()}'";

        // Class
        if ($field->getClass() !== '') {
            $properties[] = "class='{$field->getClass()}'";
        }

        // Placeholder
        if ($field->getPlaceholder() !== '') {
            $properties[] = "placeholder='{$field->getPlaceholder()}'";
        }

        // Value
        if ($field->getValue() !== '') {
            $properties[] = "value='{$field->getValue()}'";
        }

        // Required
        if ($field->isRequired() === true) {
            $properties[] = 'required';
        }

        // Disabled
        if ($field->isDisabled() === true) {
            $properties[] = 'disabled';
        }

        return $properties;
    }

    /**
     * @return string
     */
    public function render()
    {
        $field = $this->field;
        $properties = join(' ', $this->getProperties());

        if ($field->isWrapper()) {
            return "<div class='form-group'><input {$properties} /></div>";
        } else {
            return "<input {$properties} />";
        }

    }
}
