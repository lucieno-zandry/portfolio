<?php

class View
{
    protected static $sections = [];
    protected static ?string $currentSection;

    public static function startSection(string $name)
    {
        ob_start(); // start output buffering
    }

    public static function section(string $name, string $content)
    {
        if (isset(self::$sections[$name])) {
            self::$sections[$name][] = $content;
        } else {
            self::$sections[$name] = [$content];
        }
    }

    public static function endSection(string $name)
    {
        $content = ob_get_clean(); // grab buffered content
        self::section($name, $content);
    }

    public static function yield(string $name)
    {
        $section = self::$sections[$name] ?? '';

        if (is_array($section)) {
            return implode(PHP_EOL, $section);
        }

        return $section;
    }

    public static function extends(string $template)
    {
        $file = get_safe_path($template) . '.php';
        DeferredInclude::add($file);
    }
}
