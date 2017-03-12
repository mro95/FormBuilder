<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\TextField;
use Mro95\FormBuilder\Templater;

/**
 * Class TextFieldView
 * @package Mro95\FormBuilder\View
 */
class TextFieldView implements FieldView
{
    /**
     * @var TextField
     */
    protected $field;

    /** @var string */
    protected $path = '';

    /**
     * TextFieldView constructor.
     * @param TextField $textField
     * @param string $path
     */
    public function __construct(
        TextField $textField,
        string $path = 'resources/templates/textfield.php'
    ){
        $this->field = $textField;
        $this->path = $path;
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
        $field      = $this->field;
        $properties = join(' ', $this->getProperties());

        return Templater::render($this->path, compact('field', 'properties'));
    }
}
