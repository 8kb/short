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
class Template
{
    protected static $assets;
    public static $templateFolder;
    public static $globalVar;
    protected static $template;
    
    public static function render($template, $data = [])
    {
        static::$template = $template;
        $_ = new Lang(static::$template);
        extract(static::$globalVar);
        extract($data);
        if(!static::templateExists(static::$template)) {
            throw new \Exception('Unknown template ' . static::$template);
        }
        //
        ob_start();
        require static::getTemplateFilename(static::$template);
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    
    protected static function getTemplateFilename($template)
    {
        return static::$templateFolder . $template . '.php';
    }

    public static function templateExists($template)
    {
        $filename = static::getTemplateFilename($template);
        return file_exists($filename);
    }

    public static function addAsset($type, $value)
    {
        if(!isset(static::$assets[$type])) {
            static::$assets[$type] = [];
        }
        $key = md5($value);
        if(!isset(static::$assets[$type][$key])) {
            static::$assets[$type][$key] = $value;
        }
    }
    
    public static function getAssets($type)
    {
        if(isset(static::$assets[$type])) {
            return static::$assets[$type];
        } else {
            return [];
        }
    }
    
    public static function assetStart()
    {
        ob_start();
    }

    public static function assetEnd($type)
    {
        $result = ob_get_contents();
        ob_end_clean();
        static::addAsset($type, $result);
    }
}