<?php
    // Path: src/app.php



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

    function function_get_output($fn)
    {
        $args = func_get_args();
        unset($args[0]);
        ob_start();
        call_user_func_array($fn, $args);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    function display($template, $params = array())
    {
        extract($params);
        include $template;
    }

    function render($template, $params = array())
    {
        return function_get_output('display', $template, $params);
    }