<?php

@session_start();

include "config.php";

require $config['ROOT_PATH'] . "vendor/autoload.php";

$config = require $config['ROOT_PATH'] . "helpers/config.php";

$helper = new Helper($config['ROOT_PATH'] );
//$db = DB::getInstance('kreatornica.com', 'kreatorn_admin', 'iuMT?.SPzM5v', 'kreatorn_ica');

$lang = getActiveLanguage();

$consts = include 'lang/' . $lang . '.php';
$consts['rootPath'] = $config['ROOT_PATH'];

$homeContent = $helper->getHomeContent();
$consts['homeContent'] = $homeContent;

$about_us = $helper->getAboutUsContent($lang);
$consts['aboutUsTitle'] = $about_us[0]['title'];
$consts['aboutUsSubtitle'] = $about_us[0]['subtitle'];
$consts['aboutUs'] = $about_us[0]['text'];

$members = $helper->getMembersContent($lang);
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
        $consts['galleries'][$key]['images'] = str_replace($config['ROOT_PATH'], '', $tempImages);
        $consts['galleries'][$key]['data'] = $value;
    }
}
//var_dump($consts); die;
require_once $config['ROOT_PATH'] . 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem($config['ROOT_PATH'] . 'views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));


function getActiveLanguage()
{
    $lang = 'sr';
    $allowed_langs = ['sk', 'en', 'sr'];

    if(isset($_GET['lang']) && $_GET['lang'] !== '') {
        $lang = filter_var($_GET['lang'], FILTER_SANITIZE_STRING);

        if(!in_array($lang, $allowed_langs))
        {
            $lang = 'sr';
        }

        $_SESSION['USER_DATA']['lang'] = $lang;
    } else {
        if(isset($_SESSION['USER_DATA']['lang']) && in_array($_SESSION['USER_DATA']['lang'], $allowed_langs)) {
            $lang = $_SESSION['USER_DATA']['lang'];
        }
    }
    return $lang;
}