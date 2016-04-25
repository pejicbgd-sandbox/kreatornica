<?php

@session_start();

if(!defined('ROOT_PATH')) {
    define('ROOT_PATH', 'C:/xampp/htdocs/kreatornica/');
}

use voku\db\DB;
require ROOT_PATH .'vendor/autoload.php';

$db = DB::getInstance('localhost', 'kreatorci', 'QPHTUvRKzqWEU8aZ', 'kreatornica');
require_once ROOT_PATH .'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

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

$consts = [];
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['action']) && $_GET['action'] !== '') {
        $action = $_GET['action'];
        if($action == 'getAboutUsData') {
            $lang = filter_var($_GET['lang'], FILTER_SANITIZE_STRING);
            $consts = returnBulked($db, $lang);
            echo json_encode($consts); die;
        }
    } else {
        $consts = returnBulked($db, 'srb');
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['action']) && $_POST['action'] !== '') {
        $action =  $_POST['action'];

        if($action == 'saveAboutUs') {
            $lang = filter_var($_POST['lang'], FILTER_SANITIZE_STRING);
            if(!in_array($lang, ['srb', 'sk', 'eng'])) {
                echo 'error'; die;
            }
            $where['lang'] = $lang;
            $data['text'] = filter_var($_POST['text'], FILTER_SANITIZE_STRING);
            $db->update('about', $data, $where);
        }
    }
}

