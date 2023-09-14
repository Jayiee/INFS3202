<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'video_id';
    protected $allowedFields = ['video_id','video_name', 'title', 'description', 'tags', 'cover'];

    public function insertVideo($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function insertVideoInfo($videoID,$data)
    {
        $this->where('video_id', $videoID)->update($videoID,$data);
    }

    public function getVideoInfo($videoID) 
    {
        $query = $this->select('video_id,video_name,title,description,tags,cover')
        ->where('video_id',$videoID)->get();
        return $query->getResultArray();

    }

    public function getFirstVideoName($videoID) {
        $query = $this->select('video_name')->where('video_id',$videoID)->get();
        return $query->getRow()->video_name;
    }

    public function getFirstTitle($videoID) {
        $query = $this->select('title')->where('video_id',$videoID)->get();
        return $query->getRow()->title;
    }

    public function getFirstId($videoID) {
        $query = $this->select('video_id')->where('video_id',$videoID)->get();
        return $query->getRow()->video_id;
    }

    public function searchByKeyword($keyword) {
        // 从数据库中查询带有关键字的数据
        $query = $this->where('title like', '%'.$keyword.'%')
        ->orLike('tags', $keyword)->get();
        return $query->getResult();
    }

    public function getResultById($videoID) {
        $query = $this->where('video_id',$videoID)->get();
        return $query->getRow();
    }

}
