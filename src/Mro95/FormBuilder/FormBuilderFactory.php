<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormFields\TextField;

class FormBuilderFactory
{

    public function fromJson(string $jsonPath): FormBuilder
    {
        $builder = new FormBuilder();
//        $fieldFactory = new FieldFactory();
        $content = file_get_contents($jsonPath);
        $json = json_decode($content);

        foreach ($json->data as $fields) {
            if (!isset($fields->type)) {
                continue;
            }

            switch ($fields->type) {
                case 'text':
                    $field = new TextField($fields->name);
                    $field->setRequired($fields->required ?? false);
                    $builder->addField($field);
            }
        }

        return $builder;
    }

    public function fromYaml()
    {

    }
}
