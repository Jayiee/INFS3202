<title>My Course</title>
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

    <div id="course">
        <div id="my_course">
            <h2>Verity phone Number</h2>
        </div>

        <div id="profile_edit">
            <hr>
            <br><br>
            <?= form_open_multipart(base_url() . 'messages/sendSMS') ?>
                <p>
                    <lable for="sms">Phone number: </lable>
                    <input type="text" name="sms">
                </p>
                <input id="pro_save" type="submit" value="Send Message">
            </form>
        </div>

    </div>
</body>