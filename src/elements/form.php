<?php
// check if dir_root is defined
if (!defined('DIR_ROOT')) {
    // define the root directory variable
    define('DIR_ROOT', dirname(__DIR__, 1) . '/');
}



$form_data = file_get_contents(DIR_ROOT . 'src/data/form.json');
$decoded_json = json_decode($form_data, true);

$prompts = [
    'holiday' => [
        'name' => 'holiday',
        'plural' => 'holidays',
        'capitalized' => 'Holiday',
    ],
    'moral' => [
        'name' => 'moral',
        'plural' => 'morals',
        'capitalized' => 'Moral',
    ],
    'shape' => [
        'name' => 'shape',
        'plural' => 'shapes',
        'capitalized' => 'Shape',
    ],
    'spelling' => [
        'name' => 'spelling',
        'plural' => 'spellings',
        'capitalized' => 'Spelling',
    ],
    'color' => [
        'name' => 'color',
        'plural' => 'colors',
        'capitalized' => 'Color',
    ]
];

foreach ($prompts as $prompt) {
    $options = [];


    $data = $decoded_json[$prompt['plural']];
    foreach ($data as $d) {
        if (isset($_POST[$prompt['capitalized']]) && $_POST[$prompt['capitalized']] == $d['name']) {
            ${"{$prompt['name']}_options"}[] = '<option value="' . $d['name'] . '" selected>' . $d['name'] . '</option>';
            continue;
        } else {
            ${"{$prompt['name']}_options"}[] = '<option value="' . $d['name'] . '">' . $d['name'] . '</option>';
        }
    }
}



?>

<form action="/story/index.php#story" method="POST" id="tiny-tales">
    <div class="form-group mb-3">
        <label for="MainCharacter">Child / Character Name</label>
        <input type="text" class="form-control" id="MainCharacter" name="MainCharacter" value="<?php echo (isset($_POST['MainCharacter'])) ? $_POST['MainCharacter'] : ''; ?>">

        <label for="MainCharacterAge">Age</label>
        <input type="num" class="form-control" id="MainCharacterAge" name="MainCharacterAge" value="<?php echo (isset($_POST['MainCharacterAge'])) ? $_POST['MainCharacterAge'] : ''; ?>">

        <div class="container mt-4">
            <div class="row">
                <?php
                $icon = [];
                foreach ($prompts as $prompt) {
                    $icon[] = '<div class="col-12 col-sm-3 text-center mb-4">';
                        $icon[] = '<a href="#" class="category-icon" data-category="' . $prompt['name'] . '">';
                            $icon[] = '<img src="/dist/images/' . $prompt['name'] . '.svg" alt="' . $prompt['capitalized'] . '">';
                            $icon[] = ucwords($prompt['plural']);
                        $icon[] = '</a>';
                    $icon[] = '</div>';
                }
                echo join("\n", $icon);
                ?>

            </div>
        </div>

        <?php
        $selects = [];
        foreach ($prompts as $prompt) { ?>
            <div class="prompt-select" id="<?php echo $prompt['name']; ?>">
                <label for="<?php echo $prompt['capitalized']; ?>"><?php echo $prompt['capitalized']; ?></label>
                <select class="form-select" id="<?php echo $prompt['capitalized']; ?>" name="<?php echo $prompt['capitalized']; ?>" aria-label="Select <?php echo $prompt['capitalized']; ?>">
                    <option selected value="">Select a <?php echo $prompt['name']; ?></option>
                    <?php echo join("\n", ${"{$prompt['name']}_options"}); ?>
                </select>
            </div>
        <?php }
        echo join("\n", $selects);
        ?>



        <!-- 
        <label for="Narrator">Your Name</label>
        <input type="text" class="form-control" id="Narrator" name="Narrator" value="Tony"> -->

    </div>
    <button type="submit" class="btn btn-primary">Generate</button>
</form>