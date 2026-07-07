<?php

const ALLOWED_LANGUAGES = [
    'en' => ['label' => 'English'],
    'fr' => ['label' => 'Français'],
];

function load_server_lang()
{
    $langCode = 'en';

    // Check if the browser sent the language header
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        // The header looks like: "en-US,en;q=0.9,es;q=0.8"
        $acceptLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

        // Break the string down by commas to grab the very first preference
        $prefs = explode(',', $acceptLang);
        $primaryLang = $prefs[0]; // e.g., "en-US" or "en"

        // Clean it up to just the two-letter ISO code if desired (e.g., "en")
        $langCode = substr($primaryLang, 0, 2);
    }

    return $langCode;
}


function load_lang()
{
    $lang =  $_GET['lang'] ?? $_SESSION['lang'] ?? load_server_lang();
    $allowed_languages = array_keys(ALLOWED_LANGUAGES);

    if (!isset($lang) || array_search(strtolower($lang), $allowed_languages) === false) {
        $lang = "en";
    }

    // sync lang with session
    if (!isset($_SESSION['lang']) || $_SESSION['lang'] !== $lang) {
        $_SESSION['lang'] = $lang;
    }

    return $lang;
}


function load_data()
{
    $lang = load_lang();

    $data = json_decode(file_get_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR .  'data.json'), true);
    return $data;
}

function get_safe_path(string $input)
{
    $input_frags = explode("/", $input);

    $path = "";

    foreach ($input_frags as $frag) {
        if ($frag !== "") {
            $path .= DIRECTORY_SEPARATOR . $frag;
        }
    }

    return dirname(__DIR__) . $path;
}

function add_lang_to_uri(string $uri)
{
    $data = explode("?", $uri, 2);

    $path_info = $data[0];
    $query_params = "?lang=" . load_lang();

    if (isset($data[1]) && $data[1] !== "") {
        $query_params .= "&" . $data[1];
    }

    return $path_info . $query_params;
}

function writeLog(
    mixed $message,
    string $level = 'INFO'
): void {

    $file = get_safe_path('storage/logs/app.log');
    $directory = dirname($file);
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    if (!is_string($message)) {
        $message = print_r($message, true);
    }

    $entry = sprintf(
        "[%s] [%s] %s%s",
        date('Y-m-d H:i:s'),
        strtoupper($level),
        $message,
        PHP_EOL
    );

    file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);
}
