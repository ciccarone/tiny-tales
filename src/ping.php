<?php
    require_once __DIR__ . '/app.php';

    $inputs = [];
    
    if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
            $inputs[] = $key . ': ' . $value;
        }
    }
    
    $input_string = join("<br>", $inputs);

    $prompt = getenv('OPENAI_PROMPT_PREFIX') . $input_string . getenv('OPENAI_PROMPT_SUFFIX');

    // var_dump($prompt);
    
    $result = $client->completions()->create([
        // 'model' => 'text-davinci-003',
        // 'prompt' => getenv('OPENAI_PROMPT_PREFIX') . $input_string . getenv('OPENAI_PROMPT_SUFFIX'),
        // 'max_tokens' => 600,
        // 'temperature' => 0
    ]);

    echo $result['choices'][0]['text'];