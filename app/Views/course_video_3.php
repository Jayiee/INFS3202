<title>Course Video</title>

    <div style="margin-top:80px; margin-left:200px;"><h2><?php echo $first_video_title; ?></h2></div>
    
    <div id="video_play" style="display: flex;justify-content: center; align-items: center;">
        <video width="70%" height="" controls>
            <source src="<?php echo base_url(); ?><?php echo $video_path; ?>" type="video/mp4">
            <source src="<?php echo base_url(); ?><?php echo $video_path; ?>" type="video/ogg">
            <source src="<?php echo base_url(); ?><?php echo $video_path; ?>" type="video/webm">
        </video>
    </div>
    


    <div id="add_comment" style="margin-top:20px;display: flex;justify-content: center; align-items: center;">
    <?= form_open_multipart(base_url() . 'course_video_3/add_comment') ?>
        <input name="comment" style="width:500px;" placeholder="Add a comment..."required>
        <input type="submit" name="addComment" value="Comment">
    </form>
    <div style="margin-left:30px;">
    <?= form_open_multipart(base_url() . 'course_video_3/add_favourite') ?>
        <input type="submit" name="addFavourite" value="Favourite">
    </form>
    </div>
    </div>
    <hr>
    

    <div id="comment_display" style="display: flex; margin-left:200px;">
        <?php
        if($userNames&&$comments){
            $reversedUsername = array_reverse($userNames);
            $reversedComments = array_reverse($comments);
            foreach ($reversedUsername as $index => $userName) {
                echo $userName[0]['username'] . "<br>";
                foreach ($reversedComments[$index] as $ind_comment) {
                    echo $ind_comment['content']."<br>";
                    echo $ind_comment['date']."<br>";
                }
                echo "<br>";
            }
        }
            
        ?>
    </div>


