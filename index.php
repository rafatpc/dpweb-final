<?php

require_once './application/DPWeb.php';
require './libs/Smarty/Smarty.class.php';

$smarty = new Smarty;

try {
    $app = new \DPWeb\Application\DPWeb();
} catch (Exception $exc) {
    echo "<pre>";
    echo $exc->getMessage();
    echo "</pre>";
}