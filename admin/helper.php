<?php

@session_start();

// define('ROOT_PATH', 'C:/xampp/htdocs/kreatornica/');
define('ROOT_PATH', 'C:/xampp/htdocs/kreatornica/');
// define ('ROOT_PATH', '/home/kreatorn/public_html/');

require ROOT_PATH . "vendor/autoload.php";
//require '/home/kreatorn/public_html/vendor/autoload.php/';

$helper = new Helper();

$pages = array('home-admin', 'about-admin', 'member-admin', 'project-admin', 'gallery-admin', 'contact-admin', 'footer-admin');
$page = 'home-admin';
if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
    $page = $_GET['page'];
}

$loader = new Twig_Loader_Filesystem(ROOT_PATH .'admin/views/');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'autoreload' => true
));

$twig->addExtension(new Twig_Extension_Debug());

$info = [];
$info = $helper->returnBulked('sr');
//var_dump($info); die;

require_once ROOT_PATH .'vendor/twig/twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
