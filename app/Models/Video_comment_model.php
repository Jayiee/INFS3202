<?php

namespace App\Models;

use CodeIgniter\Model;

class Video_comment_model extends Model
{
    protected $table = 'video_comment';
    protected $allowedFields = ['video_id', 'comment_id'];

    public function connect($video_id,$comment_id)
    {
        $data = [
            'video_id' => $video_id,
            'comment_id' => $comment_id
        ];
        $this->insert($data);
    }

    public function getCommentID($video_id)
    {
        $query = $this->select('comment_id')->where('video_id',$video_id)->get();
        return $query->getResultArray();
    }

}