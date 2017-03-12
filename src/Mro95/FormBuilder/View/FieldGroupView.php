<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\Templater;

class FieldGroupView implements FieldView
{
    protected $fieldGroup;

    public function __construct(FieldGroup $fieldGroup)
    {
        $this->fieldGroup = $fieldGroup;
    }

    public function render()
    {
        $fields = "";
        foreach ($this->fieldGroup->getFields() as $field) {
            $fields .= (new TextFieldView($field))->render();
        }
        $output = Templater::render('resources/templates/fieldgroup.php', compact('fields'));
        return $output;
    }
}
