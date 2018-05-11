<?php
/**
 * Route URL
 */
if(s('config')->install) {
    return action('install');
}
//
$pathParts = explode('/', $path);
if ($path == '') {
    return action('index');
} elseif (count($pathParts) == 1) { // count($pathParts) == 1 and $pathParts[0] != 'index'
//    return action($pathParts[0]);
    return action('redirect', ['shortId'=>$path]);
} elseif(count($pathParts) == 2) {
    return action($pathParts[0].':'.$pathParts[1]);
} else {
    throw new \mybrand\core\NotFoundException();
}
