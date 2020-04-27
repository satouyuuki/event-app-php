<?php
namespace Application\config;
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

if(!isset($_SESSION['token']))
    $_SESSION['token']=md5(date('dmyis'));
define('ENVIRONMENT', getenv("ENVIRONMENT"));
if(ENVIRONMENT == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
define('DB_TYPE', 'mysql');
define('DB_HOST', getenv("DB_HOST"));
define('DB_NAME', getenv("DB_NAME"));
define('DB_USER', getenv("DB_USER"));
define('DB_PASS', getenv("DB_PASS"));
define('DB_CHARSET', getenv("DB_CHARSET"));