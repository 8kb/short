<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\view;

/**
 * Main class for template module
 * Render template data etc
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Template
{
    /**
     * @var string folder where located templates
     */
    public static $templateFolder;
    
    /**
     * @var string data global for all templates
     */
    public static $globalVar;
    
    /**
     * @var string template name for current template
     */
    protected $template;
    
    /**
     * @var array data for current template
     */
    protected $data;
    
    /**
     * Constructor
     * @param string $template
     * @param array $data
     */
    public function __construct(string $template, array $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    /**
     * Render this template and return result
     * @return string
     * @throws \Exception
     */
    public function render() : string
    {
        $_ = new \mybrand\core\Lang('/templ/' . $this->template);
        extract(static::$globalVar);
        extract($this->data);
        if (!$this->exist()) {
            throw new \Exception('Unknown template ' . $this->template);
        }
        //
        ob_start();
        require $this->getFilename();
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    
    /**
     * Get filename for current template
     * @return string
     */
    protected function getFilename() : string
    {
        return static::$templateFolder . $this->template . '.php';
    }

    /**
     * Check if this template exist
     * @return bool
     */
    public function exist() : bool
    {
        $filename = $this->getFilename();
        return file_exists($filename);
    }
}
