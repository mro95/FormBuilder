<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\Form;

class FormView
{
    /** @var Form $form */
    private $form;

    /** @var FieldView[] $fields */
    private $fields = [];

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function addField(FieldView $field)
    {
        $this->fields[] = $field;
    }

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
