<?php

namespace Mro95\FormBuilder\View;

/**
 * Class GenericView
 * @package Mro95\FormBuilder\View
 */
class GenericView implements ViewInterface
{
    /**
     * @var string The file path to the template
     */
    private $filePath = '';
    /**
     * @var array The bindings for the template
     */
    private $bindings = [];

    /**
     * GenericView constructor.
     * @param $filePath
     * @param $bindings
     */
    public function __construct($filePath, $bindings)
    {
        $this->filePath = $filePath;
        $this->bindings = $bindings;
    }

    /**
     * @param $filePath
     * @param $bindings
     * @return static
     */
    public static function create($filePath, $bindings)
    {
        return new static($filePath, $bindings);
    }

    /**
     * @return string HTML
     */
    public function render()
    {
        // Init buffer
        ob_start();

        // Setup bindings
        extract($this->bindings);

        // execute template
        include $this->filePath;

        // Get buffer content (template content)
        $content = ob_get_contents();

        // Clean buffer
        ob_end_clean();

        // Return content
        return $content;
    }
}
