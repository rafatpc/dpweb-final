<?php

session_start();
date_default_timezone_set('Europe/Sofia');
header('Content-type: text/html; charset=utf-8');

$time = explode(' ', microtime());
define('STARTTIME', ($time[1] + $time[0]));

require_once './application/DPWeb.php';
require_once './application/libs/Smarty/Smarty.class.php';

try {
    $app = \DPWeb\Application\DPWeb::getInstance();
} catch (Exception $exc) {
    echo "<pre>";
    echo $exc->getMessage();
    echo "</pre>";
}
