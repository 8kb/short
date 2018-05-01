<?php
if ($path == '/index') {
    throw new \http\NotFoundException(); // stop copy at SERP (for SEO)
} elseif ($path == '/') {
    echo template('app/short/index');
} elseif (startFrom($path, '/page')) {
    $template = new \view\Template('app'. $path);
    if($template->exist()) {
        echo $template->render();
    } else {
        throw new \http\NotFoundException();
    }    
} else {
    $shortId = substr($path, 1); // remove first char
    echo template('app/short/redirect', ['shortId'=>$shortId]);
}
