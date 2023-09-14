<?php
namespace App\Controllers;
use CodeIgniter\Email\Email;

class Register extends BaseController

{
    public function index()
    {
        $data['error'] = "";
        echo view('template/header');
        echo view('register',$data);
        echo view('template/footer');
    }

    public function register()
    {
        $error = "<div class=\"alert alert-danger\" role=\"alert\"> Username or Email is already taken!! </div> ";

        $username = $this->request->getPost('username'); //接收name
        $useremail = $this->request->getPost('useremail'); //接收email
        $password = $this->request->getPost('password'); //接收password
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $model = model('App\Models\User_model');  
        $data = [
            'username' => $username,
            'email' => $useremail,
            'password' => $password_hash,
            'error' =>$error
        ];
        // 判断是否唯一
        $checkUnique = $model->checkUserUnique($username,$useremail);
        if($checkUnique){
            //发送email验证
            $emailConf = [
                'protocol' => 'smtp',
                'wordWrap' => true,
                'SMTPHost' => 'mailhub.eait.uq.edu.au',
                'SMTPPort' => 25,
            ];
            $email = new Email();
            $email->initialize($emailConf);
            //Sending Email
            $email->setFrom('s4577437@student.uq.edu.au', 'JIAYE YUAN');
            $email->setTo($useremail);

            // 生成唯一的token
            $token = uniqid();
            // 发送验证链接到用户的电子邮箱
            $link = base_url('verify') . '?token=' . $token;
            $message = "Please click the link below to verify your email address: $link";
        
            $email->setSubject('Verify the email');
            $email->setMessage($message);
            $data['token'] = $token;

            // 保存用户信息
            $model->register($data);
            $user_id = $model->get_user_id($username);
            // 设置session
            $session = session();
            // 存储用户信息到session
            $session->set('username', $username);
            $session->set('password', $password); 
            //存储当前user_id到session
            $session->set('user_id', $user_id);
    
            if ($email->send()) {
                Echo 'Email sent successfully!';
                return redirect()->to(base_url('login'));
            } else {
                Echo 'Error sending email. Please try again later.';
                return redirect()->to(base_url('register'));
            }
            // return redirect()->to(base_url('login'));
        } else{
            echo view('template/header');
            echo view('register',$data);
            echo view('template/footer');
        }    
    }

    public function verify()
    {
        // 从GET参数中获取token
        $token = $this->request->getGet('token');
        // echo $token;
        
        // 在数据库中查找匹配的用户
        $model = model('App\Models\User_model');  
        $user = $model->getUserbyToken($token);
        // printf ($user->user_id);
        
        // 如果找到了匹配的用户，将其验证状态标记为已验证
        if ($user) {
            (int)$user_id = (int)$user->user_id;
            $model->updateVerify($user_id);
            echo 'Your email address has been verified!';
        } else {
            echo 'Invalid token';
        }
    }

}