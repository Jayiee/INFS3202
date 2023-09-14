<?php

namespace App\Controllers;

class CourseVideo2 extends BaseController
{
    public function index()
    {
        $data['errors'] = "";
        echo view('template/header');
        // $videoID_1=77;
        $videoID_2=78;
        // $videoID_3=80;
        $model = model('App\Models\VideoModel');
        // $first_video_id= $model->getFirstID($videoID_2);
        $first_video_name = $model->getFirstVideoName($videoID_2);

        $video_path = "writable/uploads_video/$first_video_name";

        $first_video_title = $model->getFirstTitle($videoID_2);

        $model = model('App\Models\Video_comment_model');
        $commentIDs= $model->getCommentID($videoID_2);
        if($commentIDs){
            foreach ($commentIDs as $commentID_temp) {
                foreach ($commentID_temp as $ind_commentID){
                    $model = model('App\Models\Comment_model');
                    $ind_commentID = (int)$ind_commentID;
                    $comments[] = $model->get_comments($ind_commentID);
                    $model = model('App\Models\User_comment_model');
                    $userIDs= $model->getCommentUser($ind_commentID);
                    foreach ($userIDs as $userID_temp){
                        $model = model('App\Models\User_model');
                        $userNames[] = $model->getUserName($userID_temp);
                    }
                }
            }
        }else {
            $userNames = null;
            $comments = null;
        }

        // $comment = $comments['content'];
        // $date = $comments['date'];
        $data = [
            'video_path'=>$video_path,
            'first_video_title'=>$first_video_title,
            'comments'=>$comments,
            'userNames'=>$userNames
            // 'comment'=>$comment,
            // 'date'=>$date
        ]; 
        echo view('course_video_2', $data);
        echo view('template/footer');
    }

    public function addComment() {
        $data['errors'] = "";
        // $videoID_1=77;
        $videoID_2=78;
        // $videoID_3=80;
        $userID = session()->get('user_id'); //获取userid
        $userID=(int)$userID;
        if($userID){

            $comment = $this->request->getPost('comment'); //接收comment

            $model = model('App\Models\Comment_model'); 
            $data = [
                'content' => $comment,
            ];

            $commentID = $model->addComment($data); //添加comment
            $commentID=(int)$commentID; //获取commentid
            $session= session()->set('comment_id', $commentID); //设置session

            $model = model('App\Models\User_comment_model');
            $model-> connect($userID,$commentID); //链接userid和commentid

            $model = model('App\Models\Video_comment_model');
            $model-> connect($videoID_2,$commentID);
            $this->index();
        }else{
            return redirect()->to(base_url('login'));
        }

        // $videoID=session()->get('video_id'); // 获取当前ID
        // $videoID=(int)$videoID; // 获取当前videoID
        // $model = model('App\Models\Video_comment_model');
        // $model-> connect($videoID,$commentID);

    }

    public function addFavourite(){
        $data['errors'] = "";
        // $videoID_1=77;
        $videoID_2=78;
        // $videoID_3=80;

        $userID = session()->get('user_id'); //获取userid
        
        $model = model('App\Models\Favourite_model'); 
        $model-> connect($userID,$videoID_2); //

        echo view("add_favourite");
        $this->index();

    
    }

    

}

