<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\util;

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
    protected $componentId;
    protected static $langData = [];

    public function __construct($componentId)
    {
        $this->componentId = $componentId;
        $this->tryLoadLangData(static::$lang, $componentId);
        $this->tryLoadLangData(static::$defaultLang, $componentId);
        $this->tryLoadLangData(static::$lang, static::$defaultLangSpace);
        $this->tryLoadLangData(static::$defaultLang, static::$defaultLangSpace);
    }
    
    protected function tryLoadLangData($lang, $componentId)
    {
        if(!isset(static::$langData[$lang][$componentId])) {
            $filename = static::$langFolder . $lang . '/' . $componentId . '.json';
            if(file_exists($filename)) {
                $data = file_get_contents($filename);
                static::$langData[$lang][$componentId] = json_decode($data, true);
            }
        }
    }

    public function __get($name)
    {
        $result = $this->tryGetString(static::$lang, $this->componentId, $name);
        if(is_null($result)) {
            $result = $this->tryGetString(static::$defaultLang, $this->componentId, $name);
        }
        if(is_null($result)) {
            $result = $this->tryGetString(static::$lang, static::$defaultLangSpace, $name);
        }
        if(is_null($result)) {
            $result = $this->tryGetString(static::$defaultLang, static::$defaultLangSpace, $name);
        }
        if(is_null($result)) {
            throw new \Exception('Unknown lang data ' . $this->componentId . ':' . $name);
        }
        return $result;
    }
    
    protected function tryGetString($lang, $componentId, $name)
    {
        if(isset(static::$langData[$lang][$componentId][$name])) {
            return static::$langData[$lang][$componentId][$name];
        } else {
            return null;
        }
    }
}