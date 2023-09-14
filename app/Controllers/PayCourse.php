<?php

namespace App\Controllers;

class PayCourse extends BaseController
{
    public function index()
    {
        $data['errors'] = "";
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        $model = model('App\Models\User_model');  
        $username= $model->getUserName($userID);
        $userInfo=$model->getUserInfo($userID);
        $data=[
            'username' => $username[0],
            'userInfo' => $userInfo[0]
        ];
        echo view('template/header');
        echo view('pay_course',$data);
        echo view('template/footer');
    }
}

