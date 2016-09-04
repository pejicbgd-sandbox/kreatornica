<?php

define('ROOT_PATH', 'C:/xampp/htdocs/kreatornica/');
require ROOT_PATH . "vendor/autoload.php";

$db = new DB();
$helper = new Helper();

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    if(isset($_GET['action']) && $_GET['action'] !== '')
    {
        $action = $_GET['action'];
        if($action == 'getAboutUsData')
        {
            $lang = filter_var($_GET['lang'], FILTER_SANITIZE_STRING);
            $res = $helper->getAboutUsContent($lang);

            echo json_encode($res[0]);
            die;
        }
        elseif($action == 'getMemberInfo')
        {
            $member_id = filter_var($_GET['mid'], FILTER_SANITIZE_NUMBER_INT);
            $lang = filter_var($_GET['lang'], FILTER_SANITIZE_STRING);
            if(!in_array($lang, ['sr', 'sk', 'en']))
            {
                $lang = 'sr';
            }

            $results = $helper->getSingleMemberData($member_id, $lang);
            echo json_encode($results);
            die;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    if(isset($_POST['action']) && $_POST['action'] !== '')
    {
        $action =  $_POST['action'];

        if($action == 'saveAboutUs')
        {
            $lang = filter_var($_POST['language'], FILTER_SANITIZE_STRING);
            if(!in_array($lang, ['sr', 'sk', 'en'])) {
                $lang = 'sr';
            }

            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $subtitle = filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
            $text = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

            $data = array(
                'title' => $title,
                'subtitle' => $subtitle,
                'text' => $text
            );

            $where['lang'] = $lang;
            $db->update('about', $data)
                ->where($where)
                ->run();

            echo $db->getAffected(); die;
        }
        elseif ($action == 'saveUpdatedMember')
        {
            $member_id = filter_var($_POST['member_id'], FILTER_SANITIZE_NUMBER_INT);
            $lang = filter_var($_POST['language'], FILTER_SANITIZE_STRING);
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
            $bio = filter_var($_POST['member-bio'], FILTER_SANITIZE_STRING);

            if(!in_array($lang, ['sr', 'sk', 'en'])) {
                $lang = 'sr';
            }

            $member_data = [];
            if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '')
            {
                $valid_extensions = ["jpeg", "jpg", "png"];
                $path_parts = pathinfo($_FILES["image"]["name"]);

                $extension = $path_parts['extension'];
                $filesize = $_FILES['image']['size'];

                if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/)
                {
                    $filename = time() .'-' .$_FILES["image"]["name"];

                    if(move_uploaded_file($_FILES["image"]["tmp_name"], 'C:/xampp/htdocs/kreatornica/assets/img/members/' .$filename))
                    {
                        $member_data['member_img'] = $filename;
                    }
                }
            }

            $member_data['name'] = $name;
            $member_data['text'] = $bio;
            $member_data['lang'] = $lang;
            $member_data['telefon'] = $phone;
            $member_data['email'] = $email ? $email : null;
            $member_data['updated_date'] = time();

            if(!!$member_id)
            {
                //update postojeceg
                $member_data['member_id'] = $member_id;
                $helper->updateExistingMember($member_data);
                echo "updated"; die;
            }
            else
            {
                // novi member
                $helper->insertNewMember($member_data);
                echo "inserted"; die;
            }
        }
        elseif($action == 'deleteMember')
        {
            $member_id = filter_var($_POST['member_id'], FILTER_SANITIZE_NUMBER_INT);
            $where['member_id'] = $member_id;
            $db->delete()
                ->from('members')
                ->where($where)
                ->run();

            if($db->getAffected())
            {
                $db->delete()
                    ->from('member_bio')
                    ->run();
            }

            echo 'deleted'; die;
        }
        elseif($action == 'getProjectInfo') {
            $project_id = filter_var($_POST['project'], FILTER_SANITIZE_NUMBER_INT);
            $lang = filter_var($_POST['language'], FILTER_SANITIZE_STRING);

            if(!in_array($lang, ['sr', 'sk', 'en'])) {
                $lang = 'sr';
            }
            $consts = $helper->returnBulked('sr');
            $consts['projectData'] = getProject($db, $project_id, $lang);

        }
        elseif($action == 'saveProjectInfo') {
            $project_id = filter_var($_POST['project'], FILTER_SANITIZE_NUMBER_INT);
            $lang = filter_var($_POST['language'], FILTER_SANITIZE_STRING);
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);
            $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

            $where['project_id'] = $project_id;
            $data['title_' .$lang] = $title;
            $data['text_' .$lang] = $text;
            $data['content_' .$lang] = $content;

            if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '') {
                $valid_extensions = ["jpeg", "jpg", "png"];
                $path_parts = pathinfo($_FILES["image"]["name"]);

                $extension = $path_parts['extension'];
                $filesize = $_FILES['image']['size'];

                if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/) {
                    $filename = time() .'-' .$_FILES["image"]["name"];

                    if(move_uploaded_file($_FILES["image"]["tmp_name"], 'C:/xampp/htdocs/kreatornica/assets/img/projects/' .$filename)) {
                        $data['title_img'] = $filename;
                    }
                }
            }

            $result = $db->update('projects', $data, $where);
            $consts = $helper->returnBulked('sr');
            $consts['projectData'] = getProject($db, $project_id, $lang);
        }
    } else {
        $consts = $helper->returnBulked('sr');
    }
}