<?php

namespace app\core;
class Config 
{
    private static array $config = [];

    public static function load(string $path): void
    {
        if (file_exists($path)) {
            self::$config = require $path;
        }
    }

    public static function get(string $key, $default = null)
    {
        return self::$config[$key] ?? $default;
    }
}