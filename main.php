<?php
/**
 * Route URL
 */
$pathParts = explode('/', $path);
if ($path == '') {
    action('index');
} elseif (count($pathParts) == 1) { // count($pathParts) == 1 and $pathParts[0] != 'index'
//    action($pathParts[0]);
    action('redirect', ['shortId'=>$path]);
} elseif(count($pathParts) == 2) {
    action($pathParts[0].':'.$pathParts[1]);
} else {
    throw new \mybrand\core\NotFoundException();
}
