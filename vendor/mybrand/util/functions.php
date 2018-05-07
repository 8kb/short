<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

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
