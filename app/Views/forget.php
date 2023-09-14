<body id = "index">
		
    <div id = "sign_up">
        <h1 id = "sign_up_title">Forget Password</h1>
        <hr>
        <?php echo form_open(base_url().'forget/check_user'); ?>
            <div id="register_form">
                <div class="form-group">
                    <input type="text"  class="form-control" name="username" size="35" maxlength="20" placeholder="  Username" pattern="[a-zA-Z0-9_]+" title="Username should only contain letters, numbers and underscores." required></p>
                </div>
                <div class="form-group">
			        <?php 
                        echo $error; 
                    ?>
		        </div>
                <br>
                <button id = "sign_up_button" type="submit">FORGET PASSWORD</button>
            </div>
        </form>
    </div>