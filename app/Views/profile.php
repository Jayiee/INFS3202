<title>my Profile</title>
    
    <body>
        <br>
        <div id="side_navbar">
            <nav class="nav flex-column">
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>profile_display">Profile</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>course">Courses</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>messages">Messages</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>favourite">Favourite</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>pay_course">Pay Course</a></li>
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
                <?= form_open_multipart(base_url() . 'profile/update_profile') ?>
                    <p>
                        <lable for="fullname">Full Name: </lable>
                        <input id = "pro_name" type="name" name="fullname">
                    </p>
                    <br>
                    <p>
                        <!-- 这里需要上传头像 -->
                        <lable>Profile Photo: </lable>
                        <input type="file" name="photo" accept="image/*">
                        <br>
                        <p>Maximum size of 5MB. JPG, GIF, or PNG</p>
                    </p>
                    <br>
                    <p>
                        <lable for="about">About Me: </lable>
                        <input id = "pro_about_me" type="text" size="70" name="about">
                    </p>
                    <hr>
                    <p>
                        <lable for="highestDegree">Highest Degree: </lable>
                        <input id = "pro_highest_degree" type="text" name="highestDegree">
                    </p>
                    <p>
                        <lable for="university">University: </lable>
                        <input id = "pro_university" type="text" name="university">
                    </p>
                    <hr>
                    <p>
                        <p>Secret Question: What is your favourite food?</p>
                        <input id = "pro_answer" type="text" name="answer" size="50">
                    </p>
                    <input id="pro_save" type="submit" value="Save Changes">
                </form>
            </div>
        </div>
    </body>
