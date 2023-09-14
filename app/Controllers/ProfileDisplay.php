<?php

namespace App\Controllers;

class ProfileDisplay extends BaseController
{
    public function index()
    {
        $data['errors'] = "";
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        if($userID){
        $model = model('App\Models\User_model');  
        $username= $model->getUserName($userID);
        $useremail=$model->getUserEmail($userID);
        $isVerify=$model->isVerify($userID);
        $userInfo=$model->getUserInfo($userID);
        $data=[
            'email' => $useremail[0],
            'username' => $username[0],
            'userInfo' => $userInfo[0],
            'isVerify' => $isVerify
        ];
        echo view('template/header');
        echo view('profile_display',$data);
        echo view('template/footer');
        }else{
            return redirect()->to(base_url('login'));
        }
    }
}

