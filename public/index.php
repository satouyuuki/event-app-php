<?php
session_start();
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
require APP . 'config/config.php';
require APP . 'core/application.php';
require APP . 'core/controller.php';
$app = new Application();
// echo 'app';
// var_dump($_POST);
// exit();


// var_dump(APP);
