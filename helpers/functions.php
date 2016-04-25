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
    $result = $db->select('about')->fetchAll();
    return $result[0]->{'text_' .$lang};
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