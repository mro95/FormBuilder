<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\Templater;

class FieldGroupView implements FieldView
{
    protected $fieldGroup;

    protected $textFieldView = TextFieldView::class;

    public function __construct(FieldGroup $fieldGroup)
    {
        $this->fieldGroup = $fieldGroup;
    }

    public function render()
    {
        $label = $this->fieldGroup->getLabel();
        $fields = $this->fieldGroup->getFields();
        $textFieldView = $this->textFieldView;
        $output = Templater::render('resources/templates/fieldgroup.php', compact('fields', 'label', 'textFieldView'));
        return $output;
    }
}
