<?php namespace Mro95\FormBuilder;

class FormDirector
{
    public function build(FormBuilderInterface $builder)
    {
        $builder->build();
        return $builder->getForm();
    }
}
