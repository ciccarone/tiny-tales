<?php
    define('DIR_VENDOR', __DIR__ . '/vendor/');
    
    if (file_exists(DIR_VENDOR . 'autoload.php')) {
        require_once(DIR_VENDOR . 'autoload.php');
    }

    use DevCoder\DotEnv;
    $absolutePathToEnvFile = __DIR__ . '/.env';
    (new DotEnv($absolutePathToEnvFile))->load();

    $yourApiKey = getenv('OPENAI_KEY');
    $client = OpenAI::client($yourApiKey);

    // Sample completion
    // 
    // $result = $client->completions()->create([
    //     'model' => 'text-davinci-003',
    //     'prompt' => 'Tiny Tales is',
    // ]);

    // Sample query
    // echo $result['choices'][0]['text'];
   