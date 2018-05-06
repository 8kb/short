<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
function template($templateName, $data = [])
{
    $template = new \view\Template($templateName, $data);
    return $template->render();
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
    \view\Assets::addAsset($type, $value);    
}

function assetStart()
{
    \view\Assets::assetStart();    
}

function assetEnd($type)
{
    \view\Assets::assetEnd($type);
}

function assets($type)
{
    return \view\Assets::getAssets($type);
}
