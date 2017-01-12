<?php

use Mro95\FormBuilder\Form;
use Mro95\FormBuilder\FormBuilderFactory;

class TestForm extends PHPUnit_Framework_TestCase
{
    public function testOne()
    {
        $builderFactory = new FormBuilderFactory();
        $builder = $builderFactory->fromJson('tests/test-form2.json');
        $form = $builder->build();
        var_dump($form);

        $this->assertInstanceOf(Form::class, $form);
    }
}
