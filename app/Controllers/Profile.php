<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $data['errors'] = "";
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        if($userID){
            echo view('template/header');
            echo view('profile');
            echo view('template/footer');
        }else{
            return redirect()->to(base_url('login'));
        }
    }

    public function update_profile()
    {
        $data['errors'] = "";
        $fullname = $this->request->getPost('fullname'); //接收fullname
        $about = $this->request->getPost('about'); //接收about
        $highestDegree = $this->request->getPost('highestDegree'); //接收highestDegree
        $university = $this->request->getPost('university'); //接收university
        $answer = $this->request->getPost('answer');//接收answer
        
        $userID=session()->get('user_id'); // 获取当前用户ID
        $userID=(int)$userID;
        $username=session()->get('username'); // 获取当前用户ID

        $photo = $this->request->getFile('photo'); //接收photo
        $photoName = null;
        if ($photo && $photo->isValid()) {
            // $photo->move(WRITEPATH . 'uploads_photo');//photo存到服务器
            // $photoName = $photo->getName();//获取photo名
            $photoName = $photo->getRandomName();
            // $photoName = 'default.png';
            $path = ROOTPATH.'writable/uploads_photo/';
            $photo->move($path,$photoName);
            $imageModel = model('App\Models\ImageModel');
            $width = 1024;
            $height = 1024;
            // Resize the image
            $resizeImage = $imageModel->resize($path,$photoName,$width,$height);

            // Add text watermark
            $photoName = $imageModel->addTextWatermark($path,$resizeImage,$username);
            // printf ($photoName);
            $data['photo'] = $photoName;
        }
        // } else {
        //     $photoName = null; // 如果没有上传文件，则将文件名设置为 null
        // }
        // $photoName= $photo->getName(); 
        // $photo->move(WRITEPATH . 'uploads_photo');

        $model = model('App\Models\User_model');  
        $data = [
            'fullname' => $fullname,
            'about' => $about,
            'highest_degree' => $highestDegree,
            'university' => $university,
            'photo' => $photoName,
            'answer' => $answer
        ];
        // echo ($userID);
        // $model->where('user_id', $userID)->update($data);
        $model->updateProfile($userID, $data);
        // $model->register($data);
        return redirect()->to(base_url('profile_display'));
    }

}

