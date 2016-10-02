<?php

@session_start();

if(!defined('ROOT_PATH'))
{
    define('ROOT_PATH', '/var/www/html/kreatornica/');
}

require ROOT_PATH . "vendor/autoload.php";

$config = require ROOT_PATH . "helpers/config.php";

$helper = new Helper(ROOT_PATH );
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
$consts['projects'][0]['lang'] = $lang;

$galleries = $helper->getGalleryContent($lang);
if(is_array($galleries) && !empty($galleries))
{
    $galleries[0] = $galleries['db'];
    unset($galleries['imagesArray']);
    unset($galleries['db']);
    foreach ($galleries[0] as $key => $value)
    {
        $folder = 'assets/img/gallery/gallery_id_' . $value['gallery_id'] . '/';
        $consts['galleries'][$key]['folder'] = $folder;
        $tempImages = glob($folder ."*.jpg");
        $consts['galleries'][$key]['images'] = str_replace(ROOT_PATH, '', $tempImages);
        $consts['galleries'][$key]['data'] = $value;
    }
}
// var_dump($consts); die;
require_once ROOT_PATH . 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(ROOT_PATH . 'views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));
