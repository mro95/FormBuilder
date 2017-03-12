<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\Form;

class FormView
{
    /** @var Form $form */
    protected $form;

    /** @var FieldView[] $fields */
    protected $fields = [];

    /** @var bool $formWrapper Wrap with html from tag */
    protected $formWrapper = true;

    /**
     * FormView constructor.
     * @param Form $form
     * @param bool $formWrapper Wrap with html from tag
     */
    public function __construct(Form $form, bool $formWrapper = true)
    {
        $this->form = $form;
        $this->formWrapper = $formWrapper;
    }

    /**
     * @return string
     */
    public function render()
    {
        // Init vars
        $form = $this->form;
        $html = "";

        // Render all fields
        foreach ($this->fields as $field) {
            $html .= $field->render();
        }

        // Add optional html form tag
        if ($this->getFormWrapper() === true) {
            $html = "<form method='post' action='{$form->getAction()}'>\n{$html}\n</form>";
        }

        // Return the html code
        return $html;
    }

    /**
     * @return Form
     */
    public function getForm(): Form
    {
        return $this->form;
    }

    /**
     * @param Form $form
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @return FieldView[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param FieldView[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param FieldView $field
     */
    public function addField(FieldView $field)
    {
        $this->fields[] = $field;
    }

    /**
     * @return bool
     */
    public function getFormWrapper(): bool
    {
        return $this->formWrapper;
    }

    /**
     * @param bool $formWrapper
     */
    public function setFormWrapper(bool $formWrapper)
    {
        $this->formWrapper = $formWrapper;
    }
}
