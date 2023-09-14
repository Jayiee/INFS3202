<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id','username','email','password','fullname','photo','about','highest_degree','university','token','is_verified','answer'];


    public function login($username, $password)
    {
        // $this->where('username', $username);
        // $this->where('password', $password);
        // $query = $this->get();
        // if ($query->getRowArray()) {
        //     return true;
        // }
        // return false;

        $query = $this->select('email,password')->where('username', $username)->get();
        $user = $query->getRowArray();
        if (isset($user)){
            if(password_verify($password,$user['password'])) {
                return true;
            }
        }
        return false;
    }

    public function get_user_id($username)
    {
        $this->where('username', $username);
        $query = $this->get();
        $row = $query->getRowArray();
        if ($row) {
            return $row['user_id'];
        }
        return null;
    }

    public function checkUserUnique($username,$email)
    {
        $queryName = $this->selectCount('username', 'count')
        ->where('username', $username)
        ->get();
        $resultName = $queryName->getRow();
        $countName = $resultName->count;

        $queryEmail = $this->selectCount('email', 'count')
        ->where('email', $email)
        ->get();
        $resultEmail = $queryEmail->getRow();
        $countEmail = $resultEmail->count;
        if ($countName ==0 && $countEmail==0){
            return true;
        }else {
            return false;
        }
    }

    public function register($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function updateProfile($userID, $data)
    {
        // $this->update($data);
        $this->where('user_id', $userID)->update($userID,$data);
    }

    public function getUserName($userID)
    {
        $query = $this->select('username')->where('user_id',$userID)->get();
        return $query->getResultArray();
    }

    public function getUserEmail($userID)
    {
        $query = $this->select('email')->where('user_id',$userID)->get();
        return $query->getResultArray();

    }

    public function getPhoto($userID)
    {
        $query = $this->select('photo')->where('user_id',$userID)->get();
        return $query->getResultArray();
    }

    public function getUserInfo($userID) 
    {
        $query = $this->select('fullname,photo,about,highest_degree,university')->where('user_id',$userID)->get();
        return $query->getResultArray();

    }

    public function getUserbyToken($token)
    {
        $query = $this->where('token', $token)->get();
        return $query->getRow();
    }

    public function updateVerify($userID)
    {
        $data = [
            'is_verified'=>1
        ];
        $builder = $this->where('user_id', $userID)->update($userID,$data);
    }

    public function isVerify($userID)
    {
        $query = $this->select('is_verified')->where('user_id', $userID)->get();
        $row = $query->getRow();

        if ($row && $row->is_verified == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkUsername($username) 
    {
        $queryName = $this->selectCount('username', 'count')
        ->where('username', $username)
        ->get();
        $resultName = $queryName->getRow();
        $countName = $resultName->count;
        if ($countName == 1){
            return true;
        }else {
            return false;
        }
    }

    public function checkAnswerExist($username)
    {
        $query = $this->select('answer')
        ->where('username',$username)
        ->get()->getRow()->answer;
        if ($query == null) {
            return false;
        } else {
            return true;
        }
    }

    public function checkAnswer($username,$answer)
    {
        $query = $this->selectCount('username', 'count')
        ->where('username',$username)
        ->where('answer',$answer)
        ->get()->getRow();
        $count = $query->count;
        if ($count == 1){
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($username,$password)
    {
        $query = $this->where('username', $username)->set('password',$password);
        $this->update();
    }
}
