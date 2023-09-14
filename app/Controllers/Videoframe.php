<?php

namespace App\Controllers;

class Videoframe extends BaseController
{
    public function index()
    {
        $data['errors'] = "";
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        if($userID){
            $model = model('App\Models\User_model');  
            $username= $model->getUserName($userID);
            $userInfo=$model->getUserInfo($userID);
            $data=[
                'username' => $username[0],
                'userInfo' => $userInfo[0]
            ];
            echo view('template/header');
            echo view('video_frame',$data);
            echo view('template/footer');
        }else{
            return redirect()->to(base_url('login'));
        }
        
    }

    public function upload_video() {
        $data['errors'] = "";

        $title = $this->request->getPost('video_title'); //接收title
        $description = $this->request->getPost('video_description'); //接收description
        $tag = $this->request->getPost('video_tags'); //接收tag

        $cover = $this->request->getFile('video_cover'); //接收cover
        $resources = $this->request->getFiles('video_resource'); //接收resource

        $coverName = $this->request->getFile('video_cover')->getName(); //接收video_name

        $cover->move(WRITEPATH . 'uploads_cover');//将cover保存到服务器

        // $model = new VideoModel();
        $model = model('App\Models\VideoModel');  
        // $model = model('App\Models\Upload_model');  
        $data = [
            'title' => $title,
            'description' => $description,
            'tags' => $tag,
            'cover' =>$coverName
        ];

        $videoID=session()->get('video_id'); // 获取当前videoID
        $videoID=(int)$videoID;
        $model->insertVideoInfo($videoID,$data);

        //上传多个resource文件
        foreach ($resources['video_resource'] as $resource) {
            $model = model('App\Models\Multi_upload_model');  
            $resource->move(WRITEPATH . 'uploads_resource');
            $resourceName = $resource->getName();
            $resourceID = $model->insertResource($resourceName);
            //关联video和resource
            $model = model('App\Models\Video_resource_model');
            $model->connect($videoID,$resourceID);
        }
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        $model = model('App\Models\User_model');  
        $username= $model->getUserName($userID);
        $userInfo=$model->getUserInfo($userID);
        
        $userData=[
            'username' => $username[0],
            'userInfo' => $userInfo[0]
        ];
        echo view('template/header');
        echo view('upload_successfully');
        echo view('upload_video',$userData);
        echo view('template/footer');

    }

}

