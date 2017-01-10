<?php namespace Mro95\FormBuilder;

class JsonFormBuilder extends FormBuilder
{
    private $fileName = '';

    private $jsonArray = [];

    public function __construct(string $filename, bool $load = true)
    {
        parent::__construct();
        $this->fileName = $filename;
        if ($load) {
            $this->loadFile();
        }
    }

    private function loadFile()
    {
        $content = file_get_contents($this->fileName);
        $this->jsonArray = json_decode($content, true);
    }

    public function build()
    {
        $this->buildElements($this->jsonArray['data']);
    }

    protected function buildElements($elements)
    {
        foreach ($elements as $id => $form) {
            $this->addField($id, $form);
        }
    }

    public function addField($id, $form)
    {
        $this->form->addField($id, $form);
    }
}
