<?php namespace Mro95\FormBuilder\FormFields;

use Mro95\FormBuilder\View\GenericView;

class FieldGroup implements FieldInterface
{
    private $name = '';

    private $fields = [];

    public function __construct()
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public function addField(FieldInterface $field)
    {
        $this->fields[] = $field;
    }

    public function toHtml()
    {
        // TODO: Use ViewInterface
        $fieldsHtml = '';
        foreach ($this->fields as $field) {
            $fieldsHtml .= $field->toHtml();
        }
        $view = GenericView::create('resources/FormFieldTemplates/fieldgroup.php', ['fields' => $fieldsHtml]);
        return $view->render();
    }
}
