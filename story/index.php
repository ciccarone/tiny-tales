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
        if ($value) {
            switch ($key) {
                case 'Spelling':
                    $inputs[] = 'Learn how to spell: ' . $value;
                    break;
                case 'Shape':
                    $inputs[] = 'Learn about shape: ' . $value;
                    break;
                case 'Color':
                    $inputs[] = 'Learn about color: ' . $value;
                    break;
                case 'Moral':
                    $inputs[] = 'Story moral: ' . $value;
                    break;
                default:
                    // Split field key name on CamelCase -> space
                    $key_split = preg_split('/(?=[A-Z])/', $key);
                    $inputs[] = implode(' ', $key_split) . ': ' . $value;
                    break;
            }

        }

    }
}

$input_string = join("<br>", $inputs);
// var_dump($input_string);


$prompt = getenv('APP_PROMPT_PREFIX') . "\n" . $input_string . ' ' . getenv('APP_PROMPT_SUFFIX');



// $result = $client->completions()->create([
//     'model' => 'text-davinci-003',
//     'prompt' => $prompt,
//     'max_tokens' => 300,
// ]);


// $story = $result['choices'][0]['text'];

$story = 'sample';

require_once(DIR_ROOT . 'src/head.php');

?>

<div class="container-fluid">
    <?php include_once(DIR_ROOT . 'src/header.php'); ?>

    <div class="app" id="story">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row story-cols">
                        <div class="col-12 col-sm-6 mt-3">
                            <h3>Generate another?</h3>
                            <?php include_once(DIR_ROOT . '/src/elements/form.php'); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-3">
                            <h3>Your Tiny Tale:</h3>
                            <?php render('src/elements/story.php', $params = ['story' => $story]);
                            include_once(DIR_ROOT . 'src/elements/story.php'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once(DIR_ROOT . 'src/footer.php'); ?>

</div>

<?php require_once(DIR_ROOT . 'src/foot.php'); ?>