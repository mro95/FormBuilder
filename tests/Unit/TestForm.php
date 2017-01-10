<?php

use Mro95\FormBuilder\FormDirector;
use Mro95\FormBuilder\JsonFormBuilder;

class TestForm extends TestCase
{
    public function testOne()
    {
        $builder = new JsonFormBuilder('tests/test-form1.json');
        $director = new FormDirector();
        $form = $director->build($builder);
        var_dump($form->toHtml());
    }
}
