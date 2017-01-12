<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormFields\FieldFactory;
use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\FormFields\TextField;

class FormBuilderFactory
{

    public function fromJson(string $jsonPath): FormBuilder
    {
        $builder = new FormBuilder();
        $fieldFactory = new FieldFactory();
        $content = file_get_contents($jsonPath);
        $json = json_decode($content);

        foreach ($json->data as $fieldsId => $fields) {
            if (!isset($fields->type)) {
                continue;
            }

            switch ($fields->type) {
                case 'text':
                    $textField = $fieldFactory->createTextField(
                        $fields->name,
                        $fields->required ?? false
                    );
                    $builder->addField($textField);
                    break;
                case 'fieldgroup':
                    $fieldGroup = new FieldGroup();
                    $builder->addField($fieldGroup);
                    foreach($fields->fields as $field) {

                    }
                    break;
            }
        }

        return $builder;
    }

    public function fromYaml()
    {

    }
}
