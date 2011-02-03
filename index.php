<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

$uri = $_SERVER['REQUEST_URI'];
$base = dirname($_SERVER['SCRIPT_NAME']);
$path = substr($uri, strlen($base));
$parsedUrl = parse_url(basename($path));
$requestedPage = $parsedUrl['path'];

if (strtolower(substr($requestedPage, -5)) == '.html') {
    header('Location: ' . $base . (substr($base, -1) == '/' ? '' : '/') . substr($requestedPage, 0, -5), true, 301);
    exit;
}
if (strtolower($requestedPage) == 'home' || strtolower($requestedPage) == 'index' || strtolower($requestedPage) == 'index.php') {
    header('Location: ' . $base . (substr($base, -1) == '/' ? '' : '/'), true, 301);
    exit;
}
if (!$requestedPage) {
    $requestedPage = 'home';
}
if (!ctype_alnum($requestedPage)) {
    $requestedPage = '404';
}

$baseHref = '//' . $_SERVER['SERVER_NAME'] . $base . (substr($base, -1) == '/' ? '' : '/');

if (!(include 'resources/' . $requestedPage . '.html')) {
    header('HTTP/1.0 404 Not Found');
    include 'resources/404.html';
}

include 'templates/page.php';
