<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\Form;
use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\FormFields\FieldInterface;
use Mro95\FormBuilder\FormFields\TextField;

/**
 * Class FormViewBuilder
 * @package Mro95\FormBuilder\View
 */
class FormViewBuilder
{
    /**
     * FormViewBuilder constructor.
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * @return FormView
     */
    public function build()
    {
        $formView = new FormView($this->form);

        foreach ($this->form->getFields() as $field) {
            $formView->addField(static::createFieldView($field));
        }

        return $formView;
    }

    /**
     * @param FieldInterface $field
     * @return FieldView
     * @throws \Exception
     */
    private static function createFieldView(FieldInterface $field)
    {
        if ($field instanceof TextField) {
            return new TextFieldView($field);
        } elseif ($field instanceof FieldGroup) {
            return new FieldGroupView($field);
        }

        throw new \Exception('...');
    }
}
