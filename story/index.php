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
                    $value = check_custom_data($value, 'Spelling', $_POST);
                    $inputs[] = 'Learn how to spell word: ' . $value;
                    break;
                case 'Shape':
                    $value = check_custom_data($value, 'Shape', $_POST);
                    $inputs[] = 'Learn about shape: ' . $value;
                    break;
                case 'Color':
                    $value = check_custom_data($value, 'Color', $_POST);
                    $inputs[] = 'Learn about color: ' . $value;
                    break;
                case 'Moral':
                    $value = check_custom_data($value, 'Moral', $_POST);
                    $inputs[] = 'Story moral: ' . $value;
                    break;
                case 'Holiday':
                    $value = check_custom_data($value, 'Holiday', $_POST);
                    $inputs[] = 'Story holiday: ' . $value;
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


// Remove custom selections from input->prompt
foreach ($inputs as $key => $item) {
    if (strstr($item, 'Custom'))
    unset($inputs[$key]);
}



function check_custom_data($value, $field, $post)
{
    
    return ($value == 'custom') ? $post[$field . 'Custom'] : $value;
}

$input_string = join("<br>", $inputs);


$prompt = getenv('APP_PROMPT_PREFIX') . "<br>" . $input_string . ' ' . "<br>" . getenv('APP_PROMPT_SUFFIX');


$result = $client->completions()->create([
    'model' => 'text-davinci-003',
    'prompt' => $prompt,
    'max_tokens' => 300,
]);


$story = $result['choices'][0]['text'];

// $story = 'sample';

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