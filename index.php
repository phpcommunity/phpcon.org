<?php

$uri = $_SERVER['REQUEST_URI'];

function perm_redirect($url) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $url");
    exit();
}

$resources = array(
    array('^/$', false, 'home.html'),
    array('^/sponsorships$', false, 'sponsorships.html'),

    //redirects
    array('^/index\.html$', true, '/'),
    array('^/sponsorships\.html$', true, '/sponsorships'),
);

$page = '';

foreach ($resources as $rsrc) {
    if (preg_match( '|' . $rsrc[0] . '|', $uri)) {
        if ($rsrc[1] == false) {
            $page = $rsrc[2];
            break;
        } else {
            perm_redirect($rsrc[2]);
        }
    }
}

if ($page == '') {
    header("HTTP/1.1 404 Not Found");
    die('Page not found.');
} else {
    $page = 'resources/' . $page;
}

include('templates/page.php');

