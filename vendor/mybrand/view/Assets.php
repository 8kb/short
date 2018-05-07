<?php
/*
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
namespace mybrand\view;

/**
 * Assets storage
 *
 * @author Mendel <mendel@zzzlab.com>
 */
class Assets
{
    /**
     * @var array storage
     */
    protected static $assets;

    /**
     * Add assets to storage
     * @param string $type assets type
     * @param string $value asset value
     */
    public static function addAsset(string $type, string $value)
    {
        if (!isset(static::$assets[$type])) {
            static::$assets[$type] = [];
        }
        $key = md5($value);
        if (!isset(static::$assets[$type][$key])) {
            static::$assets[$type][$key] = $value;
        }
    }
    
    /**
     * Get array of assets of selected type
     * @param string $type type of assets
     * @return array
     */
    public static function getAssets(string $type) : array
    {
        if (isset(static::$assets[$type])) {
            return static::$assets[$type];
        } else {
            return [];
        }
    }
    
    /**
     * Start buffering output for add it to asserts storage
     */
    public static function assetStart()
    {
        ob_start();
    }

    /**
     * Stop buffering output and add it to storage
     * @param string $type type for adding
     */
    public static function assetEnd(string $type)
    {
        $result = ob_get_contents();
        ob_end_clean();
        static::addAsset($type, $result);
    }
}
