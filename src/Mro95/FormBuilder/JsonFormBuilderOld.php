<?php namespace Mro95\FormBuilder;

class JsonFormBuilderOld extends FormBuilder
{
    private $json     = [];
    private $fileName = '';
    private $formObject;

    public function __construct(string $fileName, $load = true)
    {
        $this->formObject = new Form();
        $this->fileName   = $fileName;
        if ($load) {
            $this->load();
        }
    }

    public function load()
    {
        $content    = file_get_contents($this->fileName);
        $this->json = json_decode($content, true);
    }

    private function addText($id, $input)
    {
//        $input['name'] = trans($input['name']);
        $input['required'] = ($input['validation']['required'] ?? false) === true;
        $input['disabled'] = ($input['disabled'] ?? false) === true;
        $input['value'] = null;
        $validation = $input['validation'] ?? null;
        $this->formObject->addValidationRule($id, $validation);
        unset($input['validation']);
        $this->formObject->addField($id, $input);
    }

    private function addRadio($id, $form)
    {
//        $form['name'] = trans($form['name']);
        $this->formObject->addField($id, $form);
    }

    private function addFieldset($id, $form)
    {
//        $form['name'] = trans($form['name']);
        $this->formObject->addField($id, $form);
    }

    public function build()
    {
        $this->render($this->json['data']);
        var_dump($this->formObject);
    }

    private function render($elements)
    {
        foreach ($elements as $id => $form) {
            $type        = $form['type'];
            $addFunction = "add" . ucfirst($type);
            $this->$addFunction($id, $form);
        }
    }

    public function getForm()
    {
        return $this->formObject;
    }
}
