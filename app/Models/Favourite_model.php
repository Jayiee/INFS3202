<?php

namespace App\Models;

use CodeIgniter\Model;

class Favourite_model extends Model
{
    protected $table = 'favourites';
    protected $allowedFields = ['user_id', 'video_id'];

    public function connect($user_id,$video_id)
    {
        $data = [
            'user_id' => $user_id,
            'video_id' => $video_id
        ];
        $this->insert($data);
    }

    public function getCommentUser($comment_id)
    {
        $query = $this->select('user_id')->where('comment_id',$comment_id)->get();
        return $query->getResultArray();
    }

    public function getVideoID($user_id)
    {
        $query = $this->select('video_id')->where('user_id',$user_id)->get();
        return $query->getResultArray();
    }

}