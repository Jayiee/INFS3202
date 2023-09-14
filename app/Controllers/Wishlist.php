<?php

namespace App\Controllers;

class Wishlist extends BaseController
{
    public function index()
    {
        $data['errors'] = "";
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        $model = model('App\Models\User_model');  
        $username= $model->getUserName($userID); //当前用户名
        $userInfo=$model->getUserInfo($userID); //当前用户信息

        $model = model('App\Models\Wishlist_model');
        $videoIDs = $model->getVideoID($userID); //获取该用户上传的视频
        
        $videoInfos = null;
        if($videoIDs){
        $model = model('App\Models\VideoModel');
        foreach ($videoIDs as $videoID){
            foreach ($videoID as $videoID_temp){
                $videoID_temp = (int)$videoID_temp;
                $videoInfos[] = $model->getVideoInfo($videoID_temp);
            }
        }
        }
        // print_r ($videoInfos);
        $data=[
            'username' => $username[0],
            'userInfo' => $userInfo[0],
            'videoInfos'=> $videoInfos
        ];
        echo view('template/header');
        echo view('wishlist',$data);
        echo view('template/footer');
    }

    public function delete()
    {
        $video_id = $this->request->getPost('video_id');
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        $model = model('App\Models\Wishlist_model');
        $model->deleteWishlist($userID,$video_id);
        return redirect()->to(base_url("wishlist"));
        
        
    }
}
