<?php

include_once 'database/MysqliDB.php';

$db = new MysqliDb ([
    'host' => 'localhost',
    'username' => 'kreatorci', 
    'password' => 'QPHTUvRKzqWEU8aZ',
    'db'=> 'kreatornica',
    'port' => 3306,
    'prefix' => '',
    'charset' => 'utf8']);


@session_start();

$lang = 'srb';
$allowed_langs = ['sk', 'en', 'srb'];

if(isset($_GET['lang']) && $_GET['lang'] !== '') {
    $lang = filter_var($_GET['lang'], FILTER_SANITIZE_STRING);

    if(!in_array($lang, $allowed_langs)) {
        $lang = 'srb'; 
    }

    $_SESSION['USER_DATA']['lang'] = $lang;
} else {
    if(isset($_SESSION['USER_DATA']['lang']) && in_array($_SESSION['USER_DATA']['lang'], $allowed_langs)) {
        $lang = $_SESSION['USER_DATA']['lang'];
    }
}
	 
include_once 'lang/' . $lang . '.php';	
