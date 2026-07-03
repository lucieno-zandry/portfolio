<?php

class DeferredInclude
{
    private static $files = [];

    public static function add(string $file)
    {
        self::$files[] = $file;
    }

    public static function run()
    {
        foreach (self::$files as $file) {
            include $file;
        }
    }
}
