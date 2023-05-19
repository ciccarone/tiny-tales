<?php
    // Path: src/app.php

    // define the root directory variable
    define('DIR_ROOT', dirname(__DIR__, 1) . '/');

    // define the vendor directory variable & load the composer autoloader
    define('DIR_VENDOR', DIR_ROOT . '/vendor/');
    if (file_exists(DIR_VENDOR . 'autoload.php')) {
        require_once(DIR_VENDOR . 'autoload.php');
    }

    // load the .env file
    use DevCoder\DotEnv;
    $absolutePathToEnvFile = DIR_ROOT . '/.env';
    (new DotEnv($absolutePathToEnvFile))->load();

    // Connect to & load the OpenAI client
    $yourApiKey = getenv('OPENAI_KEY');
    $client = OpenAI::client($yourApiKey);

    
    // $result = $client->completions()->create([
    //     'model' => 'text-davinci-003',
    //     'prompt' => 'Tiny Tales is',
    // ]);

    // echo $result['choices'][0]['text'];