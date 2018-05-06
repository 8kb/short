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
class Assets
{
    protected static $assets;

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
