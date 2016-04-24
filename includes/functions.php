<?php

function getActiveLanguage(){
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
    return $lang;
}

function getAboutUsContent($db, $lang) {
    $about_us = $db->getOne('about', ['text_' .$lang]);
    return $about_us['text_' .$lang];
}

function getMembersContent($db, $lang) {
    $members = [];
    $db->get('member_page');
    $members_count = $db->count;
    for ($i = 1; $i<= $members_count; $i++) {

        $db->where('member_id', $i);
        $temp = $db->getOne('member_page', ['member_name', 'text_' .$lang, 'member_img']);
        array_map(function($x) { return htmlentities($x); }, $temp);

        $members[$i]['name'] = $temp['member_name'];
        $members[$i]['text'] = $temp['text_' .$lang];
        $members[$i]['img'] = $temp['member_img'];
    }
    return $members;
}

function getProjectsContent($db, $lang) {
    $projects = $db->getOne('project_page', ['text_' .$lang]);
    return $projects['text_' .$lang];
}