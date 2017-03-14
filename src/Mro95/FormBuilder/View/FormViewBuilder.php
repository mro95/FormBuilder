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
    /** @var Form $form */
    protected $form;

    /** @var string $formView */
    protected $formView = FormView::class;

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
    public function build(bool $formWrapper = true)
    {
        /** @var FormView $formView */
        $formView = new $this->formView($this->form);
        $formView->setFormWrapper($formWrapper);

        foreach ($this->form->getFields() as $field) {
            $formView->addField( static::createFieldView($field) );
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

        throw new \Exception('Field doesn\'t exists');
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
     * @return string
     */
    public function getFormView(): string
    {
        return $this->formView;
    }

    /**
     * @param string $formView
     */
    public function setFormView(string $formView)
    {
        if ($formView instanceof FormView) {
            $this->formView = $formView;
        }
    }
}
