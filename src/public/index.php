<?php

namespace RadHam;

// Composer's autoloader.
require '../vendor/autoload.php';

require 'constants.php';

#var_dump($_SERVER['REQUEST_URI']);
#var_dump($_SERVER['PATH_INFO']);
#var_dump(filter_var($_SERVER['PATH_INFO'], FILTER_SANITIZE_URL));

$query = filter_var($_SERVER['PATH_INFO'], FILTER_SANITIZE_URL);

if (!isset($_GET['_radham_query'])) {
    //trigger_error('OMG "_radham_query" var not set!');
}

#var_dump(parse_url($query));

// Trim the forward slashes out of the path var before exploding it.
$query      = String::removeFirstChar($query, '/');
$query      = String::removeLastChar($query, '/');
$controller = false;
$params     = String::split($query, '/');

if (isset($params[0])) {
    //echo "Requested controller is: <strong>{$params[0]}</strong><br>";
    $controllers = Mvc\Controllers::getList();

    if (in_array($params[0], $controllers)) {
    //if ($controllers->offsetExists($params[0])) {
        $controller = $params[0];
    }

//    if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . 'view.md')) {
        echo Markdown::render(APP_PATH . "/routes/{$controller}/view.md");
        //echo "mark it!";
//    }
}



//var_dump(sprintf('%c', '/'));

//$character_mask = " \t\n\r" . "\0\x0B" . $backslash['unicode'];

//$query = trim($query, $character_mask);
