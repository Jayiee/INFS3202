<?php

namespace App\Controllers;
use Twilio\Rest\Client;

class SMS extends BaseController
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
        echo view("send_sms",$data);
        echo view('template/footer');
        }else{
            return redirect()->to(base_url('login'));
        }
    }

    public function sendSMS()
    {
        require '/var/www/htdocs/project/vendor/autoload.php';
        $twilio_number = $this->request->getPost('keyword');

        // Your Account SID and Auth Token from twilio.com/console
        // To set up environmental variables, see http://twil.io/secure
        $account_sid = 'AC8afc7ec168783c4a8ed5bc9203bd058f';
        $auth_token = '88c2c1c343684a6d60f7ebddc7703489';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        // A Twilio number you own with SMS capabilities
        $twilio_number = "+61483902179";
        $phone = $this->request->getPost('sms');
        $phone = "+61".$phone;

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            $phone,
            [
                'from' => $twilio_number,
                'body' => 'Please reply "1" within 10 minutes to verify this phone number.',
            ]
        );
        return redirect()->to(base_url('messages'));
    }
}
