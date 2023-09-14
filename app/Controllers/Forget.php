<?php
namespace App\Controllers;

class Forget extends BaseController

{
    public function index()
    {
        $data['error']="";
        echo view('template/header');
        echo view('forget_question',$data);
        echo view('template/footer');
    }

    public function forget()
    {
        $username = cache('username');
        $answer = $this->request->getPost('answer');
        $model = model('App\Models\User_model');
        $checkAnswer = $model->checkAnswer($username,$answer);
        if($checkAnswer){
            return redirect()->to(base_url('reset_password'));
        } else {
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Wrong Answer! </div> ";
            echo view('template/header');
            echo view('forget_question',$data);
            echo view('template/footer');
        }
    }

    public function reset_index()
    {
        echo view('template/header');
        echo view('reset');
        echo view('template/footer');
    }

    public function reset()
    {
        $username = cache('username');
        $password = $this->request->getPost('password');
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $data = [
            'password' => $password_hash
        ];
        $model = model('App\Models\User_model');
        $model->resetPassword($username,$password_hash);
        // print_r($a);
        $data['reset']="<div class=\"alert alert-success\" role=\"alert\"> Reset Password Successfully! </div> ";
        $data['error']="";
        echo view('template/header');
        echo view('login',$data);
        echo view('template/footer');
    }
}