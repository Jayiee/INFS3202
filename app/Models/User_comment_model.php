<?php

namespace App\Models;

use CodeIgniter\Model;

class User_comment_model extends Model
{
    protected $table = 'user_comment';
    protected $allowedFields = ['user_id', 'comment_id','username'];

    public function connect($user_id,$comment_id)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('user_comment');
        $data = [
            'user_id' => $user_id,
            'comment_id' => $comment_id
        ];
        $this->insert($data);
    }

    public function getCommentUser($comment_id)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('users');
        // $query =$this->select('username')->from('users')
        // ->join('user_comment', 'users.user_id = user_comment.user_id')
        // ->get();

        $query = $this->select('user_id')->where('comment_id',$comment_id)->get();
        return $query->getResultArray();
    }

}