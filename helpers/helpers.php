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
    $lang = $_GET['lang'] ?? load_server_lang();
    $allowed_languages = array_keys(ALLOWED_LANGUAGES);

    if (isset($lang) && array_search(strtolower($lang), $allowed_languages) !== false) {
        return $lang;
    }

    return "en";
}


function load_data()
{
    $lang = load_lang();

    $data = json_decode(file_get_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $lang . DIRECTORY_SEPARATOR .  'data.json'), true);
    return $data;
}
