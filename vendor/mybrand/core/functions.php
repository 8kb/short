<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

/**
 * Check if string contain $needle
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function haveStr(string $haystack, string $needle) : bool
{
    return (strpos($haystack, $needle) !== false);
}

/**
 * Check if string start from $needle
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function startFrom(string $haystack, string $needle) : bool
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

/**
 * Check if strin end by $needle
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function endsBy(string $haystack, string $needle) : bool
{
    $length = strlen($needle);

    return $length === 0 ||
    (substr($haystack, -$length) === $needle);
}
