<title>Course Details</title>

<div id = Course_details>
    <div style="margin-top:80px; margin-left:480px;"><h2><?= $result->title ?></h2></div>
    <div style="margin-left:1450px;margin-bottom:30px;">
        <?= form_open_multipart(base_url() . 'details/add_wishlist') ?>
            <input type="submit" name="addWishlist" value="Add to Wishlist">
        </form>
    </div>
    <div style="width=100%">
        <div id="video_play" style="display: flex;justify-content: center; align-items: center;">
            <video width="50%" height="" controls>
                <source src="<?php echo base_url(); ?>writable/uploads_video/<?= $result->video_name ?>" type="video/mp4">
                <source src="<?php echo base_url(); ?>writable/uploads_video/<?= $result->video_name ?>" type="video/ogg">
                <source src="<?php echo base_url(); ?>writable/uploads_video/<?= $result->video_name ?>" type="video/webm">
            </video>
        </div>

        <div id="tags" style="display: flex; align-items: center; margin-left:480px;">
            <p><li style="background-color:#68b3e9; border-radius: 10px;"><?= $result->tags ?></li><p> 
            <br>
        </div>
        <div id="detail" style="background-color:#d9d9d9; width:1080px; padding-top:10px; padding-left:10px; align-items: center; display: flex; margin-top:20px; margin-left:480px;">
            <p><?= $result->description ?></p>
        </div>
    </div>
</div>

