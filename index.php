<?php

error_reporting(-1);
ini_set('display_errors', 1);

$uri = $_SERVER['REQUEST_URI'];
//echo "uri is: ".$uri."<br>";
$base = dirname($_SERVER['SCRIPT_NAME']);
//echo "base is: ".$base."<br>";
$path = substr($uri, strlen($base));
//echo "path is: ".$path."<br>";
$parsedUrl = parse_url(basename($path));
//echo "parsedUrl is: ";
//var_dump ($parsedUrl);
//echo "<br>";
$requestedPage = $parsedUrl['path'];
//echo "requestedPage is: ".$requestedPage."<br>";

if (strtolower(substr($requestedPage, -5)) == '.html') {
    header('Location: ' . $base . (substr($base, -1) == '/' ? '' : '/') . substr($requestedPage, 0, -5), true, 307);
    exit;
}
if (strtolower($requestedPage) == 'home' || strtolower($requestedPage) == 'index' || strtolower($requestedPage) == 'index.php') {
    header('Location: ' . $base . (substr($base, -1) == '/' ? '' : '/'), true, 307);
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
