<?php

@session_start();

if(!defined('ROOT_PATH')) {
    //define('ROOT_PATH', '/home/kreatorn/public_html/');
    define('ROOT_PATH', 'C:/xampp/htdocs/kreatornica/');
}

require ROOT_PATH . "vendor/autoload.php";

$config = require ROOT_PATH . "helpers/config.php";

$helper = new Helper;
//$db = DB::getInstance('kreatornica.com', 'kreatorn_admin', 'iuMT?.SPzM5v', 'kreatorn_ica');

$lang = $helper->getActiveLanguage();
$consts = include 'lang/' . $lang . '.php';
$consts['rootPath'] = ROOT_PATH;


$about_us = $helper->getAboutUsContent($lang);
$consts['aboutUsTitle'] = $about_us[0]['title'];
$consts['aboutUsSubtitle'] = $about_us[0]['subtitle'];
$consts['aboutUs'] = $about_us[0]['text'];

$members = $helper->getMembersContent();
$consts['members'] = $members;

$projectData = $helper->getProjectsContent($lang);
$consts['projects'] = $projectData;

$galleries = glob(ROOT_PATH .'assets/img/gallery/*' , GLOB_ONLYDIR);
foreach ($galleries as $key => $value)
{
    $consts['galleries'][$key]['folder'] = str_replace (ROOT_PATH, '', $value);

    $tempImages = glob($value ."/*.*");
    $consts['galleries'][$key]['images'] = str_replace (ROOT_PATH, '', $tempImages);
}

require_once ROOT_PATH . 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(ROOT_PATH . 'views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));
