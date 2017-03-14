<?php namespace Mro95\FormBuilder\View;

use Mro95\FormBuilder\FormFields\FieldGroup;
use Mro95\FormBuilder\Templater;

class FieldGroupView implements FieldView
{
    protected $fieldGroup;

    protected $textFieldView = TextFieldView::class;

    protected static $templatePath = '';

    public function __construct(FieldGroup $fieldGroup)
    {
        if(self::getTemplatePath() == '') {
            $basedir = __DIR__ . "/../../../../";
            self::setTemplatePath($basedir . "resources/templates/fieldgroup.php");
        }
        $this->fieldGroup = $fieldGroup;
    }

    public function render()
    {
        $label = $this->fieldGroup->getLabel();
        $fields = $this->fieldGroup->getFields();
        $textFieldView = $this->textFieldView;
        $output = Templater::render(self::getTemplatePath(), compact('fields', 'label', 'textFieldView'));
        return $output;
    }

    /**
     * @return string
     */
    public static function getTemplatePath(): string
    {
        return self::$templatePath;
    }

    /**
     * @param string $templatePath
     */
    public static function setTemplatePath(string $templatePath)
    {
        self::$templatePath = $templatePath;
    }
}
