<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */

/**
 * Try/catch main code
 */
try {
    $path = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1); // remove first char ('/')
    $result = require HOME.'/main.php';
} catch (Exception $e) {
    if (is_a($e, '\mybrand\core\NotFoundException')) {
        $result = action('error:notfound');
    } elseif (is_a($e, '\mybrand\core\ForbiddenException')) {
        $result = action('error:forbidden');
    } else {
        // 2DO: add error loging
        // Clear buffer if any
        if (ob_get_level()) {
            @ob_end_clean();
        }
        $result = action('error:internal', ['exception'=>$e]);
    }
}
return $result;
