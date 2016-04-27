<?php

function getActiveLanguage(){
    $lang = 'sr';
    $allowed_langs = ['sk', 'en', 'sr'];

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
        $temp = $db->select('member_page')->fetchAll();
        $members[$i]['member_id'] = $temp[0]->member_id;
        $members[$i]['name'] = $temp[0]->member_name;
        $members[$i]['text'] = $temp[0]->{'text_' .$lang};
        $members[$i]['img'] = $temp[0]->member_img;
        $members[$i]['created_date'] = gmdate('d-m-Y', $temp[0]->created_date);
        $members[$i]['email'] = $temp[0]->email;
        $members[$i]['telefon'] = $temp[0]->telefon;
    }
    return $members;
}

function getProjectsContent($db) {
    $result = $db->select('projects')->fetchAllArray();
    return $result;
}

function getProject($db, $project_id, $lang) {
    $where['project_id'] = $project_id;
    $result = $db->select('projects', $where)->fetchAllArray();

    $project['project_id'] = $project_id;
    $project['lang'] = $lang;
    $project['name'] = $result[0]['project_name'];
    $project['title'] = $result[0]['title_' .$lang];
    $project['text'] = $result[0]['text_' .$lang];
    $project['content'] = $result[0]['content_' .$lang];
    return $project;
}

function returnBulked($db, $lang) {
    $about_us = getAboutUsContent($db, $lang);
    $consts['aboutUsTitle'] = $about_us[0];
    $consts['aboutUsSubtitle'] = $about_us[1];
    $consts['aboutUs'] = $about_us[2];

    $members = getMembersContent($db, $lang);
    $consts['members'] = $members;

    $projects = getProjectsContent($db);
    $consts['projects'] = $projects;
    return $consts;
}