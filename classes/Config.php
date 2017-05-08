<?php

class Config
{
    private static $configs = [];

    public static function get($name)
    {
        if (!isset(self::$config[$name])) self::$config[$name] = json_decode(file_get_contents(dirname($_SERVER["DOCUMENT_ROOT"]) . "/config/$name.config"));
        return self::$config[$name];
    }
}