<?php

header('Content-type: text/html; charset=utf-8');

require './app/libs/Smarty.class.php';

$template = 'dpcustom';

$smarty = new Smarty;

$smarty->setTemplateDir("./{$template}/templates/");
$smarty->setCompileDir("./{$template}/templates/compiled/");
$smarty->setCacheDir("./{$template}/templates/cache/");

$smarty->assign('title', 'DarkPowerMu - Season 3 Episode 1 MuOnline');
$smarty->assign('imgs', "./{$template}/images/");
$smarty->assign('css', "./{$template}/css/");

$smarty->assign("navlinks", array(
    'News' => '#news',
    'Events' => '#events',
    'Hall of Fame' => '#hof',
));

$smarty->assign("links", array(
    'Home' => '#home',
    'Register' => '#reg',
    'Rankings' => '#ranks',
    'Download' => '#download',
    'Castle Siege' => '#cs',
    'Market' => '#market'
));

$smarty->assign('online', 20);
$smarty->assign('limit', 200);
$smarty->assign('servername', 'DarkPowerMu');

$smarty->assign('news', array(
    'Test of the news 1' => 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ',
    'Test of the news 2' => 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ',
    'Test of the news 3' => 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ',
));
$smarty->display('index.tpl');
