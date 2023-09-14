<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment_model extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $allowedFields = ['comment_id','content','date'];

    protected $useTimestamps = true;
    protected $createdField  = 'date';
    protected $updatedField  = '';
    protected $deletedField  = '';

    public function addComment($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function get_comments($comment_id)
    {
        // 查询 course_video 表中的所有记录
        $query = $this->select('content,date')->where('comment_id',$comment_id)->orderBy('date', 'DESC')->get();
        // 返回查询结果
        return $query->getResultArray();
    }

    public function get_comments_id($comment_id)
    {
        // 查询 course_video 表中的所有记录
        $query = $this->select('comment_id')->orderBy('date', 'DESC')->get();
        // 返回查询结果
        return $query->getResultArray();
    }

}
