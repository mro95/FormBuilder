<?php namespace Mro95\FormBuilder;

interface FormBuilderInterface
{
    public function getForm(): Form;
    public function build();
}
