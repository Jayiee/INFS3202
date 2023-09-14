<?php

namespace App\Models;

use CodeIgniter\Model;

class Multi_upload extends Model
{
    protected $table = 'resources';
    protected $allowedFields = ['name'];

    public function insertResource($filename)
    {
        $file = [
            'name' => $filename,
        ];
        $this->insert($file);
        return $this->insertID();
    }

}