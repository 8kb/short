<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\core;

/**
 * Language helper for short access to i18n strings
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Lang
{
    /**
     * @var string langSpace (file where stored strings) where located default strings
     */
    public static $defaultLangSpace = 'default';
    
    /**
     * @var string default language
     */
    public static $defaultLang = 'eng';
    
    /**
     * @var string current language
     */
    public static $lang = 'eng';
    
    /**
     * @var string folder where stored lang files
     */
    public static $langFolder;
    
    /**
     * @var string current component id (name)
     */
    protected $componentId;
    
    /**
     * @var array lang data cache
     */
    protected static $langData = [];

    /**
     * Constructor
     * @param string $componentId
     */
    public function __construct(string $componentId)
    {
        $this->componentId = $componentId;
        $this->tryLoadLangData(static::$lang, $componentId);
        $this->tryLoadLangData(static::$defaultLang, $componentId);
        $this->tryLoadLangData(static::$lang, static::$defaultLangSpace);
        $this->tryLoadLangData(static::$defaultLang, static::$defaultLangSpace);
    }
    
    /**
     * Try load file with some lang data (if exist)
     * @param string $lang needed lang
     * @param string $componentId needed component id
     */
    protected function tryLoadLangData(string $lang, string $componentId)
    {
        if (!isset(static::$langData[$lang][$componentId])) {
            $filename = static::$langFolder . $lang . '/' . $componentId . '.json';
            if (file_exists($filename)) {
                $data = file_get_contents($filename);
                static::$langData[$lang][$componentId] = json_decode($data, true);
            }
        }
    }

    /**
     * Get some lang string (main function)
     * @param string $name string id
     * @return string
     * @throws \Exception
     */
    public function __get($name) : string
    {
        $result = $this->tryGetString(static::$lang, $this->componentId, $name);
        if (is_null($result)) {
            $result = $this->tryGetString(static::$defaultLang, $this->componentId, $name);
        }
        if (is_null($result)) {
            $result = $this->tryGetString(static::$lang, static::$defaultLangSpace, $name);
        }
        if (is_null($result)) {
            $result = $this->tryGetString(static::$defaultLang, static::$defaultLangSpace, $name);
        }
        if (is_null($result)) {
            throw new \Exception('Unknown lang data ' . $this->componentId . ':' . $name);
        }
        return $result;
    }
    
    /**
     * Try get string (if exist - get string, if not - get null
     * @param string $lang
     * @param string $componentId
     * @param string $name
     * @return mixed
     */
    protected function tryGetString($lang, $componentId, $name)
    {
        if (isset(static::$langData[$lang][$componentId][$name])) {
            return static::$langData[$lang][$componentId][$name];
        } else {
            return null;
        }
    }
}
