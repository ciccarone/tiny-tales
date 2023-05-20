<?php
// check if dir_root is defined
if (!defined('DIR_ROOT')) {
    // define the root directory variable
    define('DIR_ROOT', dirname(__DIR__, 1) . '/');
}
require_once __DIR__ . '/app.php';
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie6 ie ltie9 ltie8 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie7 ie ltie9 ltie8 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie8 ie ltie9 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie9 ie no-js" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]--><!--<![endif]-->

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo getenv('APP_TITLE'); ?></title>
    <meta name="description" content="><?php echo getenv('APP_DESCRIPTION'); ?>">

    <meta property="og:url" content="<?php echo getenv('APP_URL'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo getenv('APP_TITLE'); ?>">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:image:alt" content="<?php echo getenv('APP_DESCRIPTION'); ?>">
    <meta property="og:description" content="<?php echo getenv('APP_DESCRIPTION'); ?>">
    <meta property="og:site_name" content="<?php echo getenv('APP_TITLE'); ?>">
    <meta property="og:locale" content="en_US">
    <meta property="article:author" content="3tone Digital">


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="./dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="./dist/css/style.css" type="text/css" rel="stylesheet">

</head>

<body>

    <!--[if lt IE 8]><div class="container"><div class="row"><div class="col-md-12 col-sm-12"><p class="alert alert-danger"><small>You are using an outdated browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</small></p></div></div></div><![endif]-->