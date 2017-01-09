<?php namespace Mro95\FormBuilder;

abstract class FromBuilder
{
    protected $form;

    public function __construct()
    {
        $this->form = new Form();
    }

    abstract public function build();
}
