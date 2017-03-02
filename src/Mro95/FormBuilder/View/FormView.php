<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\Form;

class FormView
{
    /** @var Form $form */
    protected $form;

    /** @var FieldView[] $fields */
    protected $fields = [];

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
     * FormView constructor.
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @return string
     */
    public function render()
    {
        $form = $this->form;

        $html = "<form method='post' action='{$form->getAction()}'>";

        foreach ($this->fields as $field) {
            $html .= $field->render();
        }

        $html .= "</form>";

        return $html;
    }
}
