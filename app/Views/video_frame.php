<title>Video Frame</title>
    
    <body>
        <br><br>
        <div id="side_navbar">
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
        <?= form_open_multipart(base_url() . 'video_frame/upload_video') ?>
        <div id="container">
        <div style="padding-left:30px;" id="video_frame">
            <!-- 这里需要上传视频封面 -->
            <br><br><br>
            <p>
                <lable for="video_cover">*Course Cover:</lable>
                <input type="file" name="video_cover" accept="image/*">
            </p>
            <br><br>
            <!-- 这里是title -->
            <p>
                <lable for="video_title">*Course Title:</lable>
                <input id = "video_title" type="text" name="video_title">
            </p>
            <br>
            <p>
            <!-- 这里是tags -->
                <lable for="video_tags">*Tags:</lable>
                <input id = "video_tags" type="text" name="video_tags">
            </p>
            <br>
            <!-- 这里是description -->
            <p>
                <lable for="video_description">*Course Description:</lable>
                <input id = "video_description" type="text" size ="70" name="video_description">
            </p>
            <br>
            <p>
            <!-- 这里需要上传文件 -->
                <label>Learning Resources</label>
                <input type="file" name="video_resource[]" multiple>
            </p>
            <br><br>
            <!-- 这里是提交 -->
            <input id="upload_video_button" type="submit" value="Upload Now">
        </div>
        </div>
        </form>
    </body>



