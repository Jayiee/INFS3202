<?php

namespace App\Controllers;

class Upload_video extends BaseController
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
            echo view('upload_video',$data);
            echo view('template/footer');
        }else{
            return redirect()->to(base_url('login'));
        }
    }

    public function upload_video()
    {
        $data['errors'] = "";
        if ($this->request->getMethod() === 'post' ) {
            $video = $this->request->getFile('video');
            // if (!$video->isValid()) {
            //     throw new \RuntimeException('Invalid video file');
            // }
            $video->move(WRITEPATH . 'uploads_video');
            $videoName = $video->getName();
            $model = model('App\Models\VideoModel');  
                $data = [
                    'video_name' => $videoName,
                ];
            $videoID = $model->insertVideo($data);
            $userID = session()->get('user_id');
            $session=session()->set('video_id', $videoID);

            $model = model('App\Models\User_video_model');
            $model->connect($userID,$videoID);
            echo view('template/header');
            echo view('upload_successfully');
            echo view('video_frame');
            echo view('template/footer');
    }
        
    }
    
}

