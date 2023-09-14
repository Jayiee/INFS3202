<body id = "index">
		
    <div id = "sign_up">
        <h1 id = "sign_up_title">Reset Password</h1>
        <hr>
        <?php echo form_open(base_url().'reset_login'); ?>
            <div id="register_form">
                <div class="form-group">
                    <h3> New Password: </h3>
                    <input type="password" class="form-control" placeholder="Password" required="required" name="password">
                </div>
                <br>
                <button id = "sign_up_button" type="submit">RESET</button>
            </div>
        </form>
    </div>