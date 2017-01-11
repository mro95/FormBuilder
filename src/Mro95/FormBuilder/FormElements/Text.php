<?php namespace Mro95\FormBuilder\FormElements;

class Text extends FormElement
{
    private $id;

    private $properties = [
        'id'          => '',
        'type'        => 'text',
        'name'        => '',
        'class'       => '',
        'placeholder' => '',
        'value'       => '',
        'required'    => false,
        'disabled'    => false,
    ];

    private $validation;

    private $wrapper = true;

    public function __construct($id, $properties)
    {
        $this->id = $id;
        $this->addProperty('id', $id);
        foreach ($properties as $propertyName => $propertyValue) {
            $this->addProperty($propertyName, $propertyValue);
        }
    }

    public function addProperty(string $name, string $value)
    {
        if (isset($this->properties[$name])) {
            $this->properties[$name] = $value;
        }
    }

    public function toHtml()
    {
        // TODO: Use ViewInterface
        $properties = '';
        foreach ($this->properties as $propertyName => $propertyValue) {
            if (!empty($propertyValue)) {
                if (is_bool($propertyValue) && $propertyValue === true) {
                    $properties .= " $propertyName";
                } else {
                    $properties .= " $propertyName='$propertyValue'";
                }
            }
        }
        $properties = trim($properties);
        return "<input {$properties} />";
    }
}
