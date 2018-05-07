<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\view;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Template
{
    public static $templateFolder;
    public static $globalVar;
    protected $template;
    protected $data;
    
    public function __construct($template, $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function render()
    {
        $_ = new \mybrand\util\Lang('/templ/' . $this->template);
        extract(static::$globalVar);
        extract($this->data);
        if (!$this->exist()) {
            throw new \Exception('Unknown template ' . $this->template);
        }
        //
        ob_start();
        require $this->getFilename($this->template);
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    
    protected function getFilename($template)
    {
        return static::$templateFolder . $template . '.php';
    }

    public function exist()
    {
        $filename = $this->getFilename($this->template);
        return file_exists($filename);
    }
}
