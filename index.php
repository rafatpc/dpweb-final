<?php

session_start();
date_default_timezone_set('Europe/Sofia');
header('Content-type: text/html; charset=utf-8');

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
define('STARTTIME', $time);

require_once './application/DPWeb.php';
require_once './application/libs/Smarty/Smarty.class.php';

try {
    $app = \DPWeb\Application\DPWeb::getInstance();
} catch (Exception $exc) {
    echo "<pre>";
    echo $exc->getMessage();
    echo "</pre>";
}