<?php

require_once './application/DPWeb.php';
require_once './application/libs/Smarty/Smarty.class.php';

try {
    $app = \DPWeb\Application\DPWeb::getInstance();   
} catch (Exception $exc) {
    echo "<pre>";
    echo $exc->getMessage();
    echo "</pre>";
}