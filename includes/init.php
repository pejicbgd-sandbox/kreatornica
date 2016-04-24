<?php

@session_start();

if(!defined('ROOT_PATH')) {
    define('ROOT_PATH', 'C:/xampp/htdocs/kreatornica/');
}

include ROOT_PATH . 'includes/MysqliDB.php';
include ROOT_PATH .'includes/functions.php';

$db = new MysqliDb ([
    'host' => 'localhost',
    'username' => 'kreatorci', 
    'password' => 'QPHTUvRKzqWEU8aZ',
    'db'=> 'kreatornica',
    'port' => 3306,
    'prefix' => '',
    'charset' => 'utf8']);

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
