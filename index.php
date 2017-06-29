<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function __autoload($class)
{
    $class = str_replace('\\', '/', $class);
    $class = str_replace('Radiant', 'classes', $class);
    include($_SERVER['DOCUMENT_ROOT'].$class.'.php');
}

$app = \Radiant\App::getInstance();
$app->dispatch();
