<?php

namespace App\Models;

use CodeIgniter\Model;

class Wishlist_model extends Model
{
    protected $table = 'wishlists';
    protected $allowedFields = ['user_id', 'video_id'];

    public function addWishlist($user_id,$video_id)
    {
        $data = [
            'user_id' => $user_id,
            'video_id' => $video_id
        ];
        $this->insert($data);
    }

    public function getVideoID($user_id)
    {
        $query = $this->select('video_id')->where('user_id',$user_id)->get();
        return $query->getResultArray();
    }

    public function deleteWishlist($user_id,$video_id)
    {
        $builder=$this->where('user_id',$user_id)
        ->where('video_id',$video_id);
        $this->delete();

    }

}