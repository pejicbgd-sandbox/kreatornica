<?php

@session_start();

include ("../helpers/config.php");

require $config['ROOT_PATH'] . "vendor/autoload.php";

$helper = new Helper($config['ROOT_PATH']);

$pages = array('home-admin', 'about-admin', 'member-admin', 'project-admin', 'gallery-admin', 'contact-admin', 'footer-admin');
$page = 'home-admin';
if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
    $page = $_GET['page'];
}

$loader = new Twig_Loader_Filesystem($config['ROOT_PATH'] .'admin/views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));

$twig->addExtension(new Twig_Extension_Debug());

$info = [];
$info = $helper->returnBulked('sr');
$info['ROOT_PATH'] = $config['ROOT_PATH'];
//var_dump($info); die;

require_once $config['ROOT_PATH'] .'vendor/twig/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
