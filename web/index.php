<?php

function root() {
    return dirname(__DIR__);
}

function is_debug() {
    return true;
}

if (is_debug())
    error_reporting(E_ALL);
ini_set('display_errors', is_debug());

spl_autoload_register(function($class) {
            include root() . '/' . $class . '.php';
        });

$core = new \App\Core();
$core->execute();

