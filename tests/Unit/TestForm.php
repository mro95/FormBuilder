<?php

use Mro95\FormBuilder\Form;
use Mro95\FormBuilder\FormBuilderFactory;
use Mro95\FormBuilder\View\FormViewBuilder;

class TestForm extends PHPUnit_Framework_TestCase
{
    public function testOne()
    {
        $builderFactory = new FormBuilderFactory();
        $builder = $builderFactory->fromJson('tests/test-form1.json');
        $form = $builder->build();

        $builder = new FormViewBuilder($form);
        $formView = $builder->build();
        dump($formView->render());

        $this->assertInstanceOf(Form::class, $form);
    }
}
