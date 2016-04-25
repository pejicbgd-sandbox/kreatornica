<?php

function getActiveLanguage(){
    $lang = 'srb';
    $allowed_langs = ['sk', 'en', ''];

    if(isset($_GET['lang']) && $_GET['lang'] !== '') {
        $lang = filter_var($_GET['lang'], FILTER_SANITIZE_STRING);

        if(!in_array($lang, $allowed_langs)) {
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

function getAboutUsContent($db, $lang) {
    $where = ['lang' => $lang];
    $result = $db->select('about', $where)->fetchAll();
    return [$result[0]->title, $result[0]->subtitle, $result[0]->text];
}

function getMembersContent($db, $lang) {
    $members = [];
    $result = $db->select('member_page')->fetchAll();
    for ($i = 1; $i<= count($result); $i++) {
        $temp = $db->select('member_page', ['member_id' => $i])->fetchAll();
        $members[$i]['name'] = $temp[0]->member_name;
        $members[$i]['text'] = $temp[0]->{'text_' .$lang};
        $members[$i]['img'] = $temp[0]->member_img;
    }
    return $members;
}

function getProjectsContent($db, $lang) {
    $result = $db->select('project_page')->fetchAll();
    return $result[0]->{'text_' .$lang};
}

function returnBulked($db, $lang) {
    $about_us = getAboutUsContent($db, $lang);
    $consts['aboutUsTitle'] = $about_us[0];
    $consts['aboutUsSubtitle'] = $about_us[1];
    $consts['aboutUs'] = $about_us[2];

    $members = getMembersContent($db, $lang);
    $consts['members'] = $members;

    $projects = getProjectsContent($db, $lang);
    $consts['projects'] = $projects;
    return $consts;
}