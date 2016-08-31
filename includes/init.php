<?php

@session_start();

if(!defined('ROOT_PATH')) {
    //define('ROOT_PATH', 'http://kreatornica.com');
    define('ROOT_PATH', 'http://localhost');
}


require "C:/xampp/htdocs/kreatornica/vendor/autoload.php";
$config = require "C:/xampp/htdocs/kreatornica/helpers/config.php";

//$db = DB::getInstance('kreatornica.com', 'kreatorn_admin', 'iuMT?.SPzM5v', 'kreatorn_ica');

$lang = getActiveLanguage();
$consts = include 'lang/' . $lang . '.php';
$consts['rootPath'] = ROOT_PATH;

/*$about_us = getAboutUsContent($lang);

$consts['aboutUsTitle'] = $about_us[0]['title'];
$consts['aboutUsSubtitle'] = $about_us[0]['subtitle'];
$consts['aboutUs'] = $about_us[0]['text'];*/

$members = getMembersContent($lang);
var_dump($members); die;
$consts['members'] = $members;

$projects = getProjectsContent();
$projectData = [];
foreach ($projects as $key=>$project) {
    $projectData[$key]['project_id'] = $project['project_id'];
    $projectData[$key]['project_name'] = $project['project_name'];
    $projectData[$key]['title'] = $project['title_' .$lang];
    $projectData[$key]['text'] = $project['text_' .$lang];
    $projectData[$key]['content'] = $project['content_' .$lang];
    $projectData[$key]['image'] = $project['title_img'];
}
$consts['projects'] = $projectData;

$galleries = glob(ROOT_PATH .'assets/img/gallery/*' , GLOB_ONLYDIR);
foreach ($galleries as $key => $value) {
    $consts['galleries'][$key]['folder'] = str_replace (ROOT_PATH, '', $value);

    $tempImages = glob($value ."/*.*");
    $consts['galleries'][$key]['images'] = str_replace (ROOT_PATH, '', $tempImages);
}

require_once ROOT_PATH .'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(ROOT_PATH .'views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));
