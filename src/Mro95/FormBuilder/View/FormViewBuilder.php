<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\Form;
use Mro95\FormBuilder\FormFields\FieldInterface;
use Mro95\FormBuilder\FormFields\TextField;

class FormViewBuilder
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function build()
    {
        $formView = new FormView($this->form);

        foreach ($this->form->getFields() as $field) {
            $formView->addField(static::createFieldView($field));
        }

        return $formView;
    }

    private static function createFieldView(FieldInterface $field)
    {
        if ($field instanceof TextField) {
            return new TextFieldView($field);
        }

        throw new \Exception('...');
    }
}
