<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

/**
 * Render template and return result as string
 * @param string $templateName template name
 * @param array $data array of data for render
 * @return string
 */
function template(string $templateName, array $data = []) : string
{
    $template = new \mybrand\view\Template($templateName, $data);
    return $template->render();
}

/**
 * Show array of string (concatenate it using PHP_EOL as glue)
 * Sugar function for pretty show array of data returnet by template function
 * @param array $data data for concatenate
 * @return string
 * @throws \Exception
 */
function showMany(array $data) : string
{
    if (!is_array($data)) {
        throw new \Exception('ShowMany need array!');
    }
    return implode(PHP_EOL, $data);
}

/**
 * Add asset to storage
 * @param string $type assets type
 * @param string $value asset value
 */
function addAsset(string $type, string $value)
{
    \mybrand\view\Assets::addAsset($type, $value);
}

/**
 * Start buffering output for add it to asserts storage
 */
function assetStart()
{
    \mybrand\view\Assets::assetStart();
}

/**
 * Stop buffering output and add it to storage
 * @param string $type type for adding
 */
function assetEnd(string $type)
{
    \mybrand\view\Assets::assetEnd($type);
}

/**
 * Get array of assets of selected type
 * @param string $type type of assets
 * @return array
 */
function assets(string $type) : array
{
    return \mybrand\view\Assets::getAssets($type);
}
