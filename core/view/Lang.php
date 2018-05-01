<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace view;

/**
 *
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Lang
{
    public static $defaultLangSpace = 'default';
    public static $defaultLang = 'eng';
    public static $lang = 'eng';
    public static $langFolder;
    protected $template;
    protected static $langData = [];

    public function __construct($template)
    {
        $this->template = $template;
        $this->tryLoadLangData(static::$lang, $template);
        $this->tryLoadLangData(static::$defaultLang, $template);
        $this->tryLoadLangData(static::$lang, static::$defaultLangSpace);
        $this->tryLoadLangData(static::$defaultLang, static::$defaultLangSpace);
    }
    
    protected function tryLoadLangData($lang, $template)
    {
        if(!isset(static::$langData[$lang][$template])) {
            $filename = static::$langFolder . $lang . '/' . $template . '.json';
            if(file_exists($filename)) {
                $data = file_get_contents($filename);
                static::$langData[$lang][$template] = json_decode($data, true);
            }
        }
    }

    public function __get($name)
    {
        $result = $this->tryGetString(static::$lang, $this->template, $name);
        if(is_null($result)) {
            $result = $this->tryGetString(static::$defaultLang, $this->template, $name);
        }
        if(is_null($result)) {
            $result = $this->tryGetString(static::$lang, static::$defaultLangSpace, $name);
        }
        if(is_null($result)) {
            $result = $this->tryGetString(static::$defaultLang, static::$defaultLangSpace, $name);
        }
        if(is_null($result)) {
            throw new \Exception('Unknown lang data ' . $this->template . ':' . $name);
        }
        return $result;        
    }
    
    protected function tryGetString($lang, $template, $name)
    {
        if(isset(static::$langData[$lang][$template][$name])) {
            return static::$langData[$lang][$template][$name];
        } else {
            return null;
        }
    }
}