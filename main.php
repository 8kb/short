<?php
if ($path == '/index') {
    throw new \http\NotFoundException();
} elseif ($path == '/') {
    echo template('app/index');
} elseif (startFrom($path, '/page')) {
    $template = 'app'. $path;
    if(templateExists($template)) {
        echo template($template);
    } else {
        throw new \http\NotFoundException();
    }    
} else {
    $shortId = substr($path, 1); // remove first char
    echo template('app/redirect', ['shortId'=>$shortId]);
}
