<?php

// check if dir_root is defined
if (!defined('DIR_ROOT')) {
    // define the root directory variable
    define('DIR_ROOT', dirname(__DIR__, 1) . '/');
}


require_once DIR_ROOT . 'src/app.php';

$inputs = [];

if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        // Split field key name on CamelCase -> space
        $key_split = preg_split('/(?=[A-Z])/', $key);
        $inputs[] = implode(' ', $key_split) . ': ' . $value;
    }
}

$input_string = join("<br>", $inputs);

$prompt = getenv('APP_PROMPT_PREFIX') . "\n" . $input_string . getenv('APP_PROMPT_SUFFIX');


$result = $client->completions()->create([
    'model' => 'text-davinci-003',
    'prompt' => getenv('APP_PROMPT_PREFIX') . "\n" . $input_string . getenv('APP_PROMPT_SUFFIX'),
    'max_tokens' => 300,
    'temperature' => 0.5,
]);

// var_dump($result);


$story = $result['choices'][0]['text'];

// $story = 'sample';

require_once(DIR_ROOT . '/src/head.php');

?>

<div class="container-fluid">
    <?php include_once(DIR_ROOT . 'src/header.php'); ?>

    <div class="app mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <p class="mb-0">Welcome to <?php echo getenv('APP_TITLE'); ?>, your delightful story companion for peaceful nights and magical dreams! Each story generated is created with love and care using artifical intellegence and designed to provide comfort, inspire dreams by using our vast collection of relevant prompts which ensure that every bedtime story is a unique experience, keeping children engaged and excited night after night.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app" id="story">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <?php include_once(DIR_ROOT . '/src/elements/form.php'); ?>
                        </div>
                        <div class="col-6">
                            <?php render('src/elements/story.php', $params = ['story' => $story]); include_once(DIR_ROOT . 'src/elements/story.php'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once(DIR_ROOT . 'src/footer.php'); ?>

</div>