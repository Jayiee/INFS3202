<?php

namespace App\Controllers;

class Twilio extends BaseController
{
    public function index()
    {   
        echo view("reply_sms");
    }
}