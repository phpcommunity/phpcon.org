<?php

error_reporting(E_ALL);
ini_set('display_errors', 0);

$uri = $_SERVER['REQUEST_URI'];
$base = dirname($_SERVER['SCRIPT_NAME']);
$path = substr($uri, strlen($base));
$parsedUrl = parse_url($path);
$requestedPage = $parsedUrl['path'];

if (strtolower(substr($requestedPage, -5)) == '.html') {
    header('Location: ' . $base . (substr($base, -1) == '/' ? '' : '/') . substr($requestedPage, 0, -5), true, 302);
    exit;
}
if (strtolower($requestedPage) == 'home' || strtolower($requestedPage) == 'index' || strtolower($requestedPage) == 'index.php') {
    header('Location: ' . $base . (substr($base, -1) == '/' ? '' : '/'), true, 302);
    exit;
}
if (!$requestedPage) {
    $requestedPage = 'home';
}
if (preg_match('/^(\d{4})\/?$/', $requestedPage, $matches)) {
    $requestedPage = $matches[1] . '/home';
}
if (!preg_match('/[A-Za-z0-9\/]/', $requestedPage)) {
    $requestedPage = '404';
}

$serverName = $_SERVER['SERVER_NAME'];
$serverName .= ($_SERVER['SERVER_PORT'] != 80) ? ':' . $_SERVER['SERVER_PORT'] : '';
$baseHref = '//' . $serverName . $base . (substr($base, -1) == '/' ? '' : '/');

if (!(include 'resources/' . $requestedPage . '.html')) {
    header('HTTP/1.0 404 Not Found');
    include 'resources/404.html';
}

include 'templates/page.php';
