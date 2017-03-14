<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\Templater;

class FieldGroupView implements FieldView
{
    protected $fieldGroup;

    protected $textFieldView = TextFieldView::class;

    protected $templatePath = '';

    public function __construct(FieldGroup $fieldGroup, string $templatePath = '')
    {
        if($templatePath == '') {
            $basedir = __DIR__ . "/../../../../";
            $templatePath = $basedir . "resources/templates/fieldgroup.php";
        }
        $this->fieldGroup = $fieldGroup;
        $this->templatePath = $templatePath;
    }

    public function render()
    {
        $label = $this->fieldGroup->getLabel();
        $fields = $this->fieldGroup->getFields();
        $textFieldView = $this->textFieldView;
        $output = Templater::render($this->templatePath, compact('fields', 'label', 'textFieldView'));
        return $output;
    }
}
