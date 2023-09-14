<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data['error'] = "";
        $data['reset']= "";
        // check whether the cookie is set or not, if set redirect to welcome page, if not set, check the session
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            echo view("template/header");
            echo view("home_page");
            echo view("template/footer");
        }
        else {
            $session = session();
            $username = $session->get('username');
            $password = $session->get('password');
            if ($username && $password) {
                echo view("template/header");
                echo view("home_page");
                echo view("template/footer");
            } else {
                echo view('template/header');
                echo view('login', $data);
                echo view('template/footer');
            }
        }
    }

    public function check_login()
    {
        $data['reset']= "";
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $model = model('App\Models\User_model');
        $check = $model->login($username, $password);
        $user_id = $model->get_user_id($username);
        $if_remember = $this->request->getPost('remember');
        if ($check) {
            # Create a session 
            $session = session();
            $session->set('username', $username);
            $session->set('password', $password); 
            //存储当前user_id到session
            $session->set('user_id', $user_id);
            if ($if_remember) {
                # Create a cookie
                setcookie('username', $username, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }
            echo view("template/header");
            echo view("home_page");
            echo view("template/footer");
            // $session_id = session();
            // $session_id -> set('user_id', $user_id);
        } else {
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function logout()
    {
        helper('cookie');
        $session = session();
        $session->destroy();
        //destroy the cookie
        setcookie('username', '', time() - 3600, "/");
        setcookie('password', '', time() - 3600, "/");
        //这里出现logout后的网页
        return redirect()->to(base_url('login'));
    }

    public function forget()
    {
        $data['error'] = "";
        echo view('template/header');
        echo view('forget',$data);
        echo view('template/footer');
        
    }

    public function checkUser()
    {
        $username = $this->request->getPost('username');
        $model = model('App\Models\User_model');
        $checkUsername = $model->checkUsername($username);
        if ($checkUsername){
            $checkAnswerExist = $model->checkAnswerExist($username);
            if($checkAnswerExist)
            {
                // 存储用户信息到cache
                cache()->save('username', $username,600);
                return redirect()->to(base_url('forget/question'));
            }else {
                $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> This account have NOT set the Secret Question. </div> ";
                echo view('template/header');
                echo view('forget',$data);
                echo view('template/footer');
            }
        } else{
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Username does NOT exist. </div> ";
            echo view('template/header');
            echo view('forget',$data);
            echo view('template/footer');
        }
    }


}

