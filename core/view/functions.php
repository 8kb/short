<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
function template($template, $data = [])
{
    return \view\Template::render($template, $data);
}

function templateExists($template)
{
    return \view\Template::templateExists($template);
}

function showMany($data)
{
    if(!is_array($data)) {
        throw new \Exception('ShowArray need array!');
    }
    return implode(PHP_EOL, $data);
}

function addAsset($type, $value)
{
    \view\Template::addAsset($type, $value);    
}

function assetStart()
{
    \view\Template::assetStart();    
}

function assetEnd($type)
{
    \view\Template::assetEnd($type);
}

function assets($type)
{
    return \view\Template::getAssets($type);
}

function haveStr($str, $needle)
{
    return (strpos($str, $needle) !== false);
}

function startFrom($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsBy($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 || 
    (substr($haystack, -$length) === $needle);
}