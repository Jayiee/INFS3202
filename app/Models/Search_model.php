<?php

namespace App\Models;

use CodeIgniter\Model;

class Search_model extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'video_id';
    protected $allowedFields = ['title','tags'];

    public function searchQuestions($keyword = '')
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->like('title', $keyword)
                    ->orLike('tags', $keyword, 'both');
        }

        return $builder->get()->getResult();
    }

    public function suggestQuestions($keyword = '')
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $builder->select('title, description, tags')
                    ->like('title', $keyword)
                    ->orLike('tags', $keyword, 'both');
        }

        $builder->limit(10);

        return $builder->get()->getResult();
    }
    
}