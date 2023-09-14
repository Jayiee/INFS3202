<?php

namespace App\Models;

use CodeIgniter\Model;

class Upload extends Model
{

    public function upload_video($filename)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('videos');
        $builder->where('video_name', $video_name);
        $builder->where('title', $title);
        $builder->where('description', $description);
        $builder->where('tags', $tags);
        $builder->where('cover', $cover);
        $builder->where('resource', $resource);

        if ($builder->insert($file)) {
            return true;
        } else {
            return false;
        }
    }

    public function upload($filename)
    {
        $file = [
            'name' => $filename,
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('resources');
        
        if ($builder->insert($file)) {
            return true;
        } else {
            return false;
        }
    }

        
}