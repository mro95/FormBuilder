<?php

use PHPUnit\Framework\TestCase;
use Mro95\FormBuilder\Form;
use Mro95\FormBuilder\FormBuilderFactory;
use Mro95\FormBuilder\View\FormViewBuilder;

class TestForm extends TestCase
{
    public function testOne()
    {
        $builderFactory = new FormBuilderFactory();
        $builder = $builderFactory->fromJson('tests/test-form2.json');
        $form = $builder->build();

        $builder = new FormViewBuilder($form);
        $formView = $builder->build();
        dump($formView->render());

        $this->assertInstanceOf(Form::class, $form);
    }
}
