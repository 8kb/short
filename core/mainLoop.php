<?php
/* 
 * @copyright (c) 2018 Mendel <mendel@zzzlab.com>
 * @license see license.txt
 */
try {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    echo template('main', ['path'=>$path]);
} catch (Exception $e) {
    if(is_a($e, '\http\NotFoundException')) {
        header("HTTP/1.0 404 Not Found");
        echo template('app/error/notfound');
    } elseif(is_a($e, '\http\ForbiddenException')) {
        header("HTTP/1.0 403 Forbidden");
        echo template('app/error/forbidden');
    } else {
        // 2DO: add error loging
        header("HTTP/1.0 500 Internal Server Error");
        // Clear buffer if any
        if (ob_get_level()) {
            @ob_end_clean();
        }
        echo template('app/error/internal',['exception'=>$e]);
    }
}

