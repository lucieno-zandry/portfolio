<?php
session_start();

// Only execute this safety check if running via the PHP built-in CLI server
if (php_sapi_name() === 'cli-server') {
    if (file_exists(dirname(__DIR__) . $_SERVER['SCRIPT_NAME']) && $_SERVER['SCRIPT_NAME'] !== '/index.php') {
        return false;
    }
}

require(__DIR__ . DIRECTORY_SEPARATOR . 'helpers.php');

require(get_safe_path('/helpers/view.php'));
require(get_safe_path('/helpers/deferred-include.php'));
require(get_safe_path('/helpers/env.php'));

load_env(get_safe_path('.env'));

$uri = $_SERVER['REQUEST_URI'];
$path_info = explode("?", $uri)[0];

if ($path_info === "/") $path_info = '/index.php';

$path = get_safe_path($path_info);

$filename = str_ends_with($path, '.php') ? $path : $path . '.php';

if (file_exists($filename)) {
    include($filename);
} else {
    $not_found = get_safe_path('components/ui/not-found/not-found.php');
    include($not_found);
}

DeferredInclude::run();
