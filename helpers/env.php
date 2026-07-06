<?php
if (!function_exists('env')) {
    /**
     * Load environment variables from a .env file into $_ENV and $_SERVER.
     *
     * @param string $path Path to the .env file
     * @return void
     */
    function load_env(string $path): void
    {
        if (!file_exists($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Split into name and value
            [$name, $value] = array_map('trim', explode('=', $line, 2));

            // Remove surrounding quotes if present
            if (
                preg_match('/^"(.*)"$/', $value, $matches) ||
                preg_match("/^'(.*)'$/", $value, $matches)
            ) {
                $value = $matches[1];
            }

            // Set into environment
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }

    /**
     * Get the value of an environment variable.
     *
     * @param string $key The environment variable name
     * @param mixed $default Default value if not found
     * @return mixed
     */
    function env(string $key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            $value = $_ENV[$key] ?? $_SERVER[$key] ?? null;
        }

        if ($value === null) {
            return $default;
        }

        // Handle Laravel-style casts
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }

        return $value;
    }
}
