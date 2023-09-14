<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view("search");
        echo view('template/footer');
    }

    public function details($videoID)
    {
        
        // 查询数据库，获取指定ID的结果
        $model = model('App\Models\VideoModel');
        $result = $model->getResultById($videoID);
        $session = session();
        $session->set('videoID', $videoID);
        
        // 将结果传递给视图文件，以便显示详细信息
        echo view('template/header');
        echo view('details', ['result' => $result]);
        echo view('template/footer');
    }

    public function addWishlist()
    {
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        $videoID=session()->get('videoID'); // 获取当前用户ID
        $videoID=(int)$videoID;
        $model = model('App\Models\Wishlist_model');
        $model->addWishlist($userID,$videoID);
        return redirect()->to(base_url("details/{$videoID}"));
    }


}
