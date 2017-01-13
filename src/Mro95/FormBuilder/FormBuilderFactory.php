<?php namespace Mro95\FormBuilder;

use Mro95\FormBuilder\FormFields\FieldFactory;
use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\FormFields\TextField;

class FormBuilderFactory
{

    private function createTextField(FieldFactory $fieldFactory, string $fieldId, array $field)
    {
        $textField = $fieldFactory->createTextField(
            $field['name'] ?? $fieldId,
            $field['class'] ?? '',
            $field['required'] ?? false
        );
        return $textField;
    }

    public function fromJson(string $jsonPath): FormBuilder
    {
        $builder = new FormBuilder();
        $fieldFactory = new FieldFactory();
        $content = file_get_contents($jsonPath);
        $json = json_decode($content, true);

        foreach ($json['data'] as $fieldsId => $fields) {
            if (!isset($fields['type'])) {
                continue;
            }

            switch ($fields['type']) {
                case 'text':
                    $textField = $this->createTextField($fieldFactory, $fieldsId, $fields);
                    $builder->addField($textField);
                    break;
                case 'fieldgroup':
                    $fieldGroup = new FieldGroup();
                    foreach($fields['fields'] as $fieldId => $field) {
                        $textField = $this->createTextField($fieldFactory, $fieldId, $field);
                        $textField->setWrapper(false);
                        $fieldGroup->addField($textField);
                    }
                    $builder->addField($fieldGroup);
                    break;
            }
        }

        return $builder;
    }

    public function fromYaml()
    {

    }
}
