<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

$uri = $_SERVER['REQUEST_URI'];
if (substr($uri, -1) == '/') {
    $uri = substr($uri, 0, -1);
}

$requestedPage = substr($uri, strrpos($uri, '/') + 1);
if (strtolower(substr($requestedPage, -5)) == '.html') {
    header('Location: ' . substr($uri, 0, strrpos($uri, '/')) . '/' . substr($requestedPage, 0, -5), true, 301);
    exit;
}
if (strtolower($requestedPage) == 'index' || strtolower($requestedPage) == 'index.php') {
    header('Location: /', true, 301);
    exit;
}
if (!ctype_alnum($requestedPage)) {
    $requestedPage = '404';
}
if (strlen($requestedPage) == 0) {
    $requestedPage = 'home';
}

if (!(include 'resources/' . $requestedPage . '.html')) {
    header('HTTP/1.0 404 Not Found');
    include 'resources/404.html';
}

include 'templates/page.php';
