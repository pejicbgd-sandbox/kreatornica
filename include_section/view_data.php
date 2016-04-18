<?php

require "includes/init.php";

$about_us = $db->getOne('about', ['text_' .$lang]);
$about_us = htmlentities($about_us['text_' .$lang]);

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

$projects = $db->getOne('project_page', ['text_' .$lang]);
$projects = htmlentities($projects['text_' .$lang]);