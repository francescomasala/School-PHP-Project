<?php

if ($_SERVER['QUERY_STRING'] == 'img=default.svg') {
    $name = "../../graphics/vector/default.svg";
    $fp = fopen($name, 'rb');
    header('Content-Type: image/svg+xml');
    header("Content-Length: " . filesize($name));
    fpassthru($fp);
    exit;
} elseif ($_SERVER['QUERY_STRING'] == 'img=default-monochrome.svg') {
    $name = "../../graphics/vector/default-monochrome.svg";
    $fp = fopen($name, 'rb');
    header('Content-Type: image/svg+xml');
    header("Content-Length: " . filesize($name));
    fpassthru($fp);
    exit;
} elseif ($_SERVER['QUERY_STRING'] == 'img=default-monochrome-black.svg') {
    $name = "../../graphics/vector/default-monochrome-black.svg";
    $fp = fopen($name, 'rb');
    header('Content-Type: image/svg+xml');
    header("Content-Length: " . filesize($name));
    fpassthru($fp);
    exit;
} elseif ($_SERVER['QUERY_STRING'] == 'img=default-monochrome-white.svg') {
    $name = "../../graphics/vector/default-monochrome-white.svg";
    $fp = fopen($name, 'rb');
    header('Content-Type: image/svg+xml');
    header("Content-Length: " . filesize($name));
    fpassthru($fp);
    exit;
} else {
    return http_response_code(403);
}
