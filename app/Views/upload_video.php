  <head>
    <title>Video Upload</title>
  </head>
  <body>
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

    <div id="upload_video">
      <!-- <form id="upload_form" enctype="multipart/form-data"> -->
      <?= form_open_multipart(base_url() . 'upload_video/video_frame') ?>
        <div id="dropzone">
          <span>Drag and drop video files to upload</span>
        </div>
        <input id= "video_input" type="file" name="video" >
        <!-- style="display:none;", accept="video/mp4,video/mov,video/webm,video/ogg" -->
        <input id="upload_video_button" type="submit" value="Upload Video">
      </form>

      <div id="video_preview">
        <video id="uploaded-video" width="640"></video>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
        // 防止浏览器默认行为
        $(document).on('dragenter', function(e) {
            e.stopPropagation();
            e.preventDefault();
        });

        $(document).on('dragover', function(e) {
            e.stopPropagation();
            e.preventDefault();
        });

        $(document).on('drop', function(e) {
            e.stopPropagation();
            e.preventDefault();
            
            // 获取拖拽的文件
            var files = e.originalEvent.dataTransfer.files;
            // 更新input元素上的文件对象
            $('#video_input').prop('files', files);
            // 将文件名显示到dropzone中
            $('#dropzone').html('File selected: ' + files[0].name);
            // 创建FormData对象
            var formData = new FormData();
            formData.append('video', this.files[0]);
            // 上传文件
            // $('#upload_video_button').click(function(e) {
                // e.preventDefault();
            $.ajax({
                url: '/Upload_video/upload_video',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log('File uploaded successfully!');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error uploading file!');
                }
            // });
            });
        });

        // 点击dropzone，打开文件选择框
        $('#dropzone').click(function() {
            $('#video_input').click();
        });

        // 选择文件后，将文件添加到表单中
        $('#video_input').change(function() {
            $('#dropzone').html('File selected: ' + this.files[0].name);
            // 创建FormData对象
            var formData = new FormData();
            formData.append('video', this.files[0]);
            // 上传文件
            $.ajax({
            url: '/Upload_video/upload_video',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log('File uploaded successfully!');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error uploading file!');
            }
            });
        });
        });
    </script>

    
  </body>
