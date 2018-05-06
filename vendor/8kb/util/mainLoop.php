<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
try {
    $path = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1); // remove first '/'
    require HOME.'/main.php';
} catch (Exception $e) {
    if(is_a($e, '\util\http\NotFoundException')) {
        header("HTTP/1.0 404 Not Found");
        action('error:notfound');
    } elseif(is_a($e, '\util\http\ForbiddenException')) {
        header("HTTP/1.0 403 Forbidden");
        action('error:forbidden');
    } else {
        // 2DO: add error loging
        header("HTTP/1.0 500 Internal Server Error");
        // Clear buffer if any
        if (ob_get_level()) {
            @ob_end_clean();
        }
        action('error:internal',['exception'=>$e]);
    }
}

