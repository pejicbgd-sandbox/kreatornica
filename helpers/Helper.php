<?php

class Helper
{
    private $_rootPath;

    public function __construct($path)
    {
        $this->_rootPath = $path;
    }

    public function getHomeContent()
    {
        $db = new DB();

        $db->select()
            ->from('home')
            ->run();

        return $db->getSelected();
    }

    public function getAboutUsContent($lang)
    {
        $db = new DB();
        $where_equal_to['lang'] = $lang;
        $db->select()
            ->from('about')
            ->where($where_equal_to)
            ->run();

        return $db->getSelected();
    }

    public function getMembersContent($lang = 'sr')
    {
        $where['mb.lang'] = $lang;

        $db = new DB;
        $members = [];

        $db->select()
            ->from('members m')
            ->leftJoin(['member_bio mb ON m.member_id = mb.member_id'])
            ->where($where)
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

        $members = $this->getMembersContent($lang);
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

    public function updateProjectData($project_id, $lang, $project_data, $gallery_id)
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

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $this->_rootPath . 'assets/img/projects/' .$filename)) {
                    $data['title_img'] = $filename;
                }
            }
        }

        $db = new DB();
        $db->select()
            ->from('projects_info')
            ->where($where)
            ->run();

        $result = $db->getSelected();

        if(!empty($result))
        {
            $db = new DB();
            $db->update('projects_info', $project_data)
                ->where($where)
                ->run();

            unset($where['lang']);
        }
        else
        {
            $project_data['project_id'] = $project_id;
            $db = new DB();
            $db->insertInto('projects_info', $project_data)
                ->run();
        }

        if($gallery_id == 0 || $gallery_id == '')
        {
            $gallery_id = null;
        }

        $data['gallery_id'] = $gallery_id;

        $db = new DB();
        $db->update('projects', $data)
            ->where($where)
            ->run();

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

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $this->_rootPath . 'assets/img/projects/' .$filename)) {
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
        $returnArray['imagesArray'] = [];
        $returnArray['db'] = [];

        $where['gi.lang'] = $lang;

        if($gallery_id)
        {
            $where['g.gallery_id'] = $gallery_id;
            $folder_name = $this->_rootPath . 'assets/img/gallery/gallery_id_' . $gallery_id;

            if(file_exists($folder_name))
            {
                $handle = opendir($folder_name);
                while($file = readdir($handle))
                {
                    if($file !== '.' && $file !== '..')
                    {
                        $returnArray['imagesArray'][] = $file;
                    }
                }
            }
        }

        $db = new DB();
        $db->select()
            ->from('gallery g')
            ->leftJoin(['gallery_info gi ON g.gallery_id = gi.gallery_id'])
            ->where($where)
            ->run();

        $returnArray['db'] = $db->getSelected();

        return $returnArray;
    }

    public function setGalleryInfo($data)
    {
        $valid_extensions = ["jpeg", "jpg", "png"];
        $folder_name = $this->_rootPath . 'assets/img/gallery/gallery_id_' . $data['gallery_id'];
        $where['gallery_id'] = $data['gallery_id'];

        if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '')
        {
            $path_parts = pathinfo($_FILES["image"]["name"]);

            $extension = $path_parts['extension'];
            $filesize = $_FILES['image']['size'];

            if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/)
            {
                if(!file_exists($folder_name))
                {
                    mkdir($folder_name, 0777);
                }

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $folder_name . '/head.' . $extension))
                {
                    $gal['gallery_img'] = 'head.' . $extension;

                    $db = new DB();
                    $db->update('gallery', $gal)
                        ->where($where)
                        ->run();
                }
            }
        }

        $total = count($_FILES['images']['name']);
        if($total > 0)
        {
            for($i = 0; $i < $total; $i++)
            {
                $path_parts = pathinfo($_FILES["images"]["name"][$i]);

                $extension = $path_parts['extension'];
                $filesize = $_FILES['images']['size'][$i];

                if(in_array($extension, $valid_extensions) && $filesize < 10485760)
                {
                    if(!file_exists($folder_name))
                    {
                        mkdir($folder_name, 0777);
                    }

                    @copy($_FILES['images']['tmp_name'][$i], $folder_name.'/'.$_FILES['images']['name'][$i]);
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

    public function createNewGallery($data)
    {
        $valid_extensions = ["jpeg", "jpg", "png"];
        if(isset($_FILES["image"]["type"]) && $_FILES["image"]["type"] !== '')
        {
            $path_parts = pathinfo($_FILES["image"]["name"]);

            $extension = $path_parts['extension'];
            $filesize = $_FILES['image']['size'];

            $gallery_data['gallery_name'] = $data['gallery_name'];
            $gallery_data['gallery_img'] = 'head.' . $extension;

            $db = new DB();
            $db->insertInto('gallery', $gallery_data)
                ->run();

            $gallery_info['gallery_id'] = $db->getInsertedId();
            $gallery_info['text'] = $data['text'];
            $gallery_info['title'] = $data['title'];
            $gallery_info['content'] = $data['content'];
            $gallery_info['lang'] = $data['lang'];

            $db = new DB();
            $db->insertInto('gallery_info', $gallery_info)
                ->run();

            if(in_array($extension, $valid_extensions) && $filesize < 10485760 /*10MB*/)
            {
                $folder_name = $this->_rootPath . 'assets/img/gallery/gallery_id_' . $gallery_info['gallery_id'];
                if(!file_exists($folder_name))
                {
                    mkdir($folder_name, 0777);
                }
                move_uploaded_file($_FILES["image"]["tmp_name"], $folder_name . '/head.' . $extension);
            }
        }
    }

    public function getProjectPopupInfo($project_id, $lang)
    {
        $where['pi.project_id'] = $project_id;
        $where['pi.lang'] = $lang;

        $db = new DB();
        $db->select()
            ->from('projects p')
            ->innerJoin(['projects_info pi ON p.project_id = pi.project_id'])
            ->where($where)
            ->run();

        return $db->getSelected();
    }

    public function saveHomeData($link)
    {
        if($link) {
            $data['video'] = $link;
        }

        $total = count($_FILES['home_image']['name']);
        if($total > 0)
        {
            $path_parts = pathinfo($_FILES["home_image"]["name"]);

            $extension = $path_parts['extension'];
            $valid_extensions = ["jpeg", "jpg", "png"];
            $filesize = $_FILES['home_image']['size'];

            if(in_array($extension, $valid_extensions) && $filesize < 10485760)
            {
                $folder_name = $this->_rootPath . 'assets/img/home';
                
                if(!file_exists($folder_name))
                {
                    mkdir($folder_name, 0777);
                }

                copy($_FILES['home_image']['tmp_name'], $folder_name.'/'.$_FILES['home_image']['name']);
                $data['naslovna'] = $_FILES['home_image']['name'];
            }
        }

        $db = new DB();
        $db->update('home', $data)
            ->run();

        return $db->getAffected();
    }
}
