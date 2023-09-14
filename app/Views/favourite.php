    <title>Favourite</title>
    <body>
        <br>
        <div id="side_navbar">
        <?php
            if(!$userInfo['photo']){
                echo '<br><img src="writable/uploads_photo/default.png"width="180px" height="" alt="profile_photo">'.'<br>';
            } else {
            echo '<br><img src="writable/uploads_photo/'.($userInfo['photo']).'"width="180px" height="" alt="profile_photo">'.'<br>';
            }
            echo '<h3>'.($username['username']).'</h3><br>';
        ?>
            <nav class="nav flex-column">
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>profile_display">Profile</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>course">Courses</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>messages">Messages</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>favourite">Favourite</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>pay_course">Donate</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>wishlist">Wishlist</a></li>
                <form action="<?php echo base_url(); ?>upload_video" method="get">
                    <button type="submit">Upload Course</button>
                </form>
            </nav>
        </div>

        <div id="favourite">
            <div id="my_favourite">
                <h2>My Favourite</h2>
            </div>
            <div id="fav_del">
            </div>

            <?php 
                if($videoInfos){
                foreach ($videoInfos as $videoInfo_temp){
                    foreach ($videoInfo_temp as $videoInfo){
                    if($videoInfo['cover']){
                        echo ('<div style="margin-left:230px;margin-top:20px;background-color: #f1f1f1; padding-left:10%; padding-top:20px; width:50%;"><img width=500px src="writable/uploads_cover/'.$videoInfo['cover']).'"><br>';
                    } else{
                        echo ('<div style="margin-left:230px;margin-top:20px;background-color: #f1f1f1; padding-left:10%; padding-top:20px; width:50%;"><img width=500px src="writable/uploads_cover/default.png">'.'<br>');
                    }
                    if($videoInfo['title']){
                        echo ('<h3>'.$videoInfo['title']).'</h3>';
                    }else{
                        echo ("<h3>NO TITLE</h3>");
                    }
                    if($videoInfo['description']){
                        echo ('<p>'.$videoInfo['description'].'<p></div><br><br>');
                    } else{
                        echo ("<p>no description</p></div><br><br>");
                    }
                    }
                }}
            ?>
        </div>
    </body>