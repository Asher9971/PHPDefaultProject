<?php

spl_autoload_register(function ($class_name) {
    include "classes/{$class_name}.php";
});

register_shutdown_function('shutdown');

$cfgMain = Config::get("main");

switch ($cfgMain->show_error) {
    case 0: // production
        error_reporting(0);
        break;
    case 1: // testing
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        break;
    default: // default: show no errors
        error_reporting(0);
}

$database = new Database(
    $cfgMain->database->host,
    $cfgMain->database->user,
    $cfgMain->database->password,
    $cfgMain->database->name
);

function shutdown()
{
    // code is executed in the end
}