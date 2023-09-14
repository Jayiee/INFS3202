<title>my Profile</title>
    
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
                <div id="side_navbar_button">
                <form action="<?php echo base_url(); ?>upload_video" method="get">
                    <button type="submit">Upload Course</button>
                </form>
                </div>
            </nav>
        </div>

        <div id="profile">
            <div id="my_profile">
                <h2>My Profile</h2>
            </div>
            
            <div id="profile_edit">
                <hr>
                <h2>INTRODUCTION</h2>
                <br><br>
                <?php
                    if(!$userInfo['photo']){
                        echo '<h3> Profile Photo: '.'<img src="writable/uploads_photo/default.png"width="300px" height="" alt="profile_photo">'.'<br><br>';
                    } else {
                    echo '<h3> Profile Photo: '.'<img src="writable/uploads_photo/'.($userInfo['photo']).'"width="300px" height="" alt="profile_photo">'.'<br><br>';
                    }
                    echo 'Username: '.($username['username']).'<br><br>';
                    echo 'Email: '.($email['email']).'<br><br>';
                    if ($isVerify == 0) {
                        echo 'Email Verification: Unverified.<br><br>';
                    }else {
                        echo 'Email Verification: Verified.<br><br>';
                    }
                    echo 'Full Name: '.($userInfo['fullname']).'<br><br>';
                    echo 'About me: '.($userInfo['about']).'<br><br>';
                    echo 'Highest Degree: '.($userInfo['highest_degree']).'<br><br>';
                    echo 'University: '.($userInfo['university']).'</h3><br>';
                ?> 
                <h3>Secret Question: What is your favourite food?</h3>
                    <form action="<?php echo base_url(); ?>profile" method="get">
                        <button id="pro_save" type="submit">Change profile</button>
                    </form>
            </div>
        </div>
    </body>
