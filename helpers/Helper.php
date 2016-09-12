<?php

class Helper
{
    public function getActiveLanguage()
    {
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

    public function getAboutUsContent($lang)
    {
        $db = new DB;
        $where_equal_to['lang'] = $lang;
        $db->select()
            ->from('about')
            ->where($where_equal_to)
            ->run();

        return $db->getSelected();
    }

    public function getMembersContent()
    {
        $db = new DB;
        $members = [];

        $db->select()
            ->from('members m')
            ->leftJoin(['member_bio mb ON m.member_id = mb.member_id'])
            ->groupBy('m.member_id')
            ->run();

        $temp = $db->getSelected();
        if($db->isIterable($temp))
        {
            for ($i = 0; $i < count($temp); $i++) {
                $members[$i]['member_id'] = $temp[$i]['member_id'];
                $members[$i]['lang'] = $temp[$i]['lang'];
                $members[$i]['name'] = $temp[$i]['name'];
                $members[$i]['text'] = $temp[$i]['text'];
                $members[$i]['img'] = $temp[$i]['member_img'];
                $members[$i]['created_date'] = gmdate('d-m-Y', $temp[$i]['updated_date']);
                $members[$i]['email'] = $temp[$i]['email'];
                $members[$i]['telefon'] = $temp[$i]['telefon'];
            }
        }
        return $members;
    }

    public function getProjectsContent($lang)
    {
        $projectData = [];
        $where_equal_to['pi.lang'] = $lang;

        $db = new DB;
        $db->select()
            ->from('projects p')
            ->innerJoin(['projects_info pi ON p.project_id = pi.project_id'])
            ->where($where_equal_to)
            ->run();

        $results = $db->getSelected();
        if($db->isIterable($results))
        {
            foreach ($results as $key => $result)
            {
                $projectData[$key]['project_id'] = $result['project_id'];
                $projectData[$key]['project_name'] = $result['project_name'];
                $projectData[$key]['title'] = $result['title'];
                $projectData[$key]['text'] = $result['text'];
                $projectData[$key]['content'] = $result['content'];
                $projectData[$key]['image'] = $result['title_img'];
            }
        }

        return $projectData;
    }

    public function getSingleProjectData($project_id, $lang)
    {
        $db = new DB();

        $where['pi.project_id'] = $project_id;
        $where['pi.lang'] = $lang;

        $db->select()
            ->from('projects p')
            ->innerJoin(array('projects_info pi ON pi.project_id = p.project_id'))
            ->where($where)
            ->run();

        return $db->getSelected();
    }

    public function returnBulked($lang)
    {
        $about_us = $this->getAboutUsContent($lang);
        $consts['aboutUsTitle'] = $about_us[0]['title'];
        $consts['aboutUsSubtitle'] = $about_us[0]['subtitle'];
        $consts['aboutUs'] = $about_us[0]['text'];

        $members = $this->getMembersContent();
        $consts['members'] = $members;

        $projects = $this->getProjectsContent($lang);
        $consts['projects'] = $projects;

        $gallery = $this->getGalleryContent($lang);
        $consts['galleries'] = $gallery;

        return $consts;
    }

    public function getSingleMemberData($member_id, $lang)
    {
        $where_equal_to['m.member_id'] = $member_id;
        $where_equal_to['mb.lang'] = $lang;

        $db = new DB;
        $db->select()
            ->from('members m')
            ->leftJoin(['member_bio mb ON m.member_id = mb.member_id'])
            ->where($where_equal_to)
            ->run();

        return $db->getSelected();
    }

    public function insertNewMember($member_data = [])
    {
        $bio_data['text'] = $member_data['text'];
        $bio_data['lang'] = $member_data['lang'];

        unset($member_data['text']);
        unset($member_data['lang']);

        $db = new DB();
        $db->insertInto('members', $member_data)
            ->run();

        $bio_data['member_id'] = $db->getInsertedId();

        $db = new DB();
        $db->insertInto('member_bio', $bio_data)
            ->run();

        return $db->getInsertedId();
    }

    public function updateExistingMember($member_data)
    {
        $where['members.member_id'] = $member_data['member_id'];

        $bio_data['text'] = $member_data['text'];
        $bio_data['lang'] = $member_data['lang'];

        unset($member_data['text']);
        unset($member_data['lang']);

        $db = new DB();
        $db->update('members', $member_data)
            ->where($where)
            ->run();

        if($db->getAffected())
        {
            $where = [];
            $where['member_bio.member_id'] = $member_data['member_id'];
            $where['member_bio.lang'] = $bio_data['lang'];

            $db = new DB();
            $db->update('member_bio', $bio_data)
                ->where($where)
                ->run();

            if(!$db->getAffected())
            {
                $bio_data['member_id'] = $member_data['member_id'];
                $db->insertInto('member_bio', $bio_data)
                    ->run();
            }
        }
        return $db->getAffected();
    }

    public function updateProjectData($project_id, $lang, $project_data)
    {
        $where['project_id'] = $project_id;
        $where['lang'] = $lang;

        if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '')
        {
            $valid_extensions = ["jpeg", "jpg", "png"];
            $path_parts = pathinfo($_FILES["image"]["name"]);

            $extension = $path_parts['extension'];
            $filesize = $_FILES['image']['size'];

            if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/)
            {
                $filename = time() .'-' .$_FILES["image"]["name"];

                if(move_uploaded_file($_FILES["image"]["tmp_name"], 'C:/xampp/htdocs/kreatornica/assets/img/projects/' .$filename)) {
                    $data['title_img'] = $filename;
                }
            }
        }

        $db = new DB();
        $db->update('projects_info', $project_data)
            ->where($where)
            ->run();

        unset($where['lang']);

        if(isset($data))
        {
            $db = new DB();
            $db->update('projects', $data)
                ->where($where)
                ->run();
        }

        return $db->getAffected();
    }

    public function insertProjectData($projectData)
    {
        if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '')
        {
            $valid_extensions = ["jpeg", "jpg", "png"];
            $path_parts = pathinfo($_FILES["image"]["name"]);

            $extension = $path_parts['extension'];
            $filesize = $_FILES['image']['size'];

            if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/)
            {
                $filename = time() .'-' .$_FILES["image"]["name"];

                if(move_uploaded_file($_FILES["image"]["tmp_name"], 'C:/xampp/htdocs/kreatornica/assets/img/projects/' .$filename)) {
                    $data['title_img'] = $filename;
                }
            }
        }

        $data['project_name'] = $projectData['project_name'];
        $data['created_date'] = time();

        $db = new DB();
        $db->insertInto('projects', $data)
            ->run();

        $infoData['project_id'] = $db->getInsertedId();
        $infoData['title'] = $projectData['title'];
        $infoData['text'] = $projectData['text'];
        $infoData['content'] = $projectData['content'];
        $infoData['lang'] = $projectData['lang'];

        $db = new DB();
        $db->insertInto('projects_info', $infoData)
            ->run();

        return $db->getInsertedId();
    }

    public function getGalleryContent($lang, $gallery_id = false)
    {
        $where['gi.lang'] = $lang;

        if($gallery_id)
        {
            $where['g.gallery_id'] = $gallery_id;
        }

        $db = new DB();
        $db->select()
            ->from('gallery g')
            ->leftJoin(['gallery_info gi ON g.gallery_id = gi.gallery_id'])
            ->where($where)
            ->run();

        return $db->getSelected();
    }

    public function setGalleryInfo($data)
    {
        $where['gallery_id'] = $data['gallery_id'];

        if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '')
        {
            $valid_extensions = ["jpeg", "jpg", "png"];
            $path_parts = pathinfo($_FILES["image"]["name"]);

            $extension = $path_parts['extension'];
            $filesize = $_FILES['image']['size'];

            if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/)
            {
                $folder_name = 'C:/xampp/htdocs/kreatornica/assets/img/gallery/gallery_id_' . $data['gallery_id'];
                if(!file_exists($folder_name))
                {
                    mkdir($folder_name, 0777);
                }

                $filename = time() .'-' .$_FILES["image"]["name"];

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $folder_name . '/' .$filename))
                {
                    $gal['gallery_img'] = $filename;
                    $db = new DB();
                    $db->update('gallery', $gal)
                        ->where($where)
                        ->run();
                }
            }
        }

        $gallery['text'] = $data['text'];
        $gallery['title'] = $data['title'];
        $gallery['content'] = $data['content'];

        $where['lang'] = $data['lang'];

        $db = new DB();
        $db->update('gallery_info', $gallery)
            ->where($where)
            ->run();

        return $db->getAffected();
    }
}
