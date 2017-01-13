<?php namespace Mro95\FormBuilder\FormFields;

use Mro95\FormBuilder\View\GenericView;

class TextField implements FieldInterface
{
    private $id = '';

    private $name = '';

    private $class = '';

    private $placeholder = '';

    private $value = '';

    private $required = false;

    private $disabled = false;

    private $validation = [];

    private $wrapper = true;

    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class)
    {
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    /**
     * @param string $placeholder
     */
    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required)
    {
        $this->required = $required;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     */
    public function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
    }

    /**
     * @return array
     */
    public function getValidation(): array
    {
        return $this->validation;
    }

    /**
     * @param array $validation
     */
    public function setValidation(array $validation)
    {
        $this->validation = $validation;
    }

    /**
     * @return bool
     */
    public function isWrapper(): bool
    {
        return $this->wrapper;
    }

    /**
     * @param bool $wrapper
     */
    public function setWrapper(bool $wrapper)
    {
        $this->wrapper = $wrapper;
    }

    public function toHtml()
    {
        $properties = '';

        //ID
        if ($this->id !== '') {
            $properties .= " id='{$this->getId()}'";
        }

        // Name
        $properties .= " name='{$this->getName()}'";

        // Class
        if ($this->class !== '') {
            $properties .= " class='{$this->getClass()}'";
        }

        // Placeholder
        if ($this->placeholder !== '') {
            $properties .= " placeholder='{$this->getPlaceholder()}'";
        }

        // Value
        if ($this->value !== '') {
            $properties .= " value='{$this->getValue()}'";
        }

        // Required
        if ($this->isRequired() === true) {
            $properties .= ' required';
        }

        // Disabled
        if ($this->isDisabled() === true) {
            $properties .= ' disabled';
        }

        $properties = trim($properties);

        $fieldsHtml = GenericView::create('resources/FormFieldTemplates/textfield.php', compact('properties'))->render();
        if ($this->isWrapper()) {
            $view = GenericView::create(
                'resources/FormFieldTemplates/fieldgroup.php',
                ['fields' => $fieldsHtml]
            )->render();
        } else {
            $view = $fieldsHtml;
        }

        return $view;
    }
}
