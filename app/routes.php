<?php

$controller = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])['path']);

if (!$controller) $controller = 'index';

if ( ! file_exists(APP_PATH . "/controllers/{$controller}.controller.php")) {

    abort(404);

}

require APP_PATH . "/controllers/{$controller}.controller.php";
