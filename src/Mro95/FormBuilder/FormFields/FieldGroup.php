<?php namespace Mro95\FormBuilder\FormFields;

class FieldGroup implements FieldInterface
{
    /** @var string */
    private $name = '';

    /** @var string */
    private $label = '';

    /** @var array */
    private $fields = [];

    /**
     * FieldGroup constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param FieldInterface $field
     */
    public function addField(FieldInterface $field)
    {
        $this->fields[] = $field;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }
}
