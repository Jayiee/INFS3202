<?php

namespace App\Models;

use CodeIgniter\Model;

class User_video_model extends Model
{
    protected $table = 'user_video';
    protected $allowedFields = ['user_id', 'video_id'];

    public function connect($user_id,$video_id)
    {
        $data = [
            'user_id' => $user_id,
            'video_id' => $video_id,
        ];
        $this->insert($data);
    }

    public function getVideoID($user_id)
    {
        $query = $this->select('video_id')->where('user_id',$user_id)->get();
        return $query->getResultArray();
    }

}