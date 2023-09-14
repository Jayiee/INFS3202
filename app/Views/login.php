<body id = "index">
	<div id = "sign_up">
        <?php echo form_open(base_url().'login/check_login'); ?>
        <h1 id = "sign_up_title">LOG IN</h1>
        <hr>
        <div id="register_form">
            <div class="form-group">
			    <?php 
                    echo $reset; 
                ?>
		    </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required" name="username">
            </div>
            <br><br>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required" name="password">
            </div>
            <div class="form-group">
			    <?php 
                    echo $error; 
                ?>
		    </div>
            <br>
            <a aria-current="page" href="<?php echo base_url(); ?>register">Register?</a>
            <br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox" name = "remember"> Remember me</label>                        
                <br><br>
                <p><a href="<?php echo base_url(); ?>login/forget" class="float-right">Forgot Password?</a></p>
            </div>
        </div>
        <?php echo form_close(); ?>
	</div>
</div>

