<?php

@session_start();

if(!defined('ROOT_PATH')) {
    define('ROOT_PATH', 'C:/server/htdocs/kreatornica/');
}

use voku\db\DB;

require ROOT_PATH .'vendor/autoload.php';

$db = DB::getInstance('localhost', 'kreatorci', 'QPHTUvRKzqWEU8aZ', 'kreatornica');

$lang = getActiveLanguage();
$consts = include 'lang/' . $lang . '.php';

$about_us = getAboutUsContent($db, $lang);
$consts['aboutUs'] = $about_us;

$members = getMembersContent($db, $lang);
$consts['members'] = $members;

$projects = getProjectsContent($db, $lang);
$consts['projects'] = $projects;

require_once ROOT_PATH .'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(ROOT_PATH .'views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));
$twig->addExtension(new Twig_Extension_Debug());
