<?php namespace Mro95\FormBuilder;

abstract class FormBuilder implements FormBuilderInterface
{
    /** @var Form */
    protected $form = null;

    public function __construct()
    {
        $this->form = new Form();
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
    public function setForm($form)
    {
        $this->form = $form;
    }
}
