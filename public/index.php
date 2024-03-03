<?php

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

// Запуск сессии
session_start();

// Назначение констант
define('ROOT', mb_substr(dirname(__FILE__), 0, -7));
define('SITE', 'libr.local');
define('URL', 'http://'.SITE);

// Подключение файлов системы
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Functions.php');
// dd($_SESSION);
// phpinfo();

// Вызов маршрутизатора
$router = new Router();
$router->run();