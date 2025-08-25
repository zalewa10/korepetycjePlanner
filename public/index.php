<?php
// public/index.php
require_once __DIR__ . '/../vendor/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/../app/core/Database.php';

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', '0');


use Smarty\Smarty;

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/../app/views/');
$smarty->setCompileDir(__DIR__ . '/../vendor/smarty/templates_c/');
$smarty->setCacheDir(__DIR__ . '/../vendor/smarty/cache/');
$smarty->setConfigDir(__DIR__ . '/../vendor/smarty/configs/');
$smarty->addPluginsDir(__DIR__ . '/../libs/plugins'); // <-- add your custom plugins dir

$db = new Database();

$smarty->display('kalendarz.tpl');
