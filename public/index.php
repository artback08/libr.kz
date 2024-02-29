<?php

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', mb_substr(dirname(__FILE__), 0, -7));
define('SITE', 'libr.local');
define('URL', 'http://'.SITE);
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Functions.php');
// dd($_SESSION);

// Вызов Router
$router = new Router();
$router->run();