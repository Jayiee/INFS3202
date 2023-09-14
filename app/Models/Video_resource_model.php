<?php

namespace App\Models;

use CodeIgniter\Model;

class Video_resource_model extends Model
{
    protected $table = 'video_resource';
    protected $allowedFields = ['video_id', 'resource_id'];

    public function connect($video_id,$resource_id)
    {
        $data = [
            'video_id' => $video_id,
            'resource_id' => $resource_id
        ];
        $this->insert($data);
    }

}