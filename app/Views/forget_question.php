<body id = "index">
		
    <div id = "sign_up">
        <h1 id = "sign_up_title">Secret Question:</h1>
        <hr>
        <?php echo form_open(base_url().'answer'); ?>
            <div id="register_form">
                <div class="form-group">
                    <h3> What is your favourite food? </h3>
                    <input type="text"  class="form-control" name="answer" size="35" maxlength="255" placeholder=" Answer..." required></p>
                </div>
                <div class="form-group">
			        <?php 
                        echo $error; 
                    ?>
		        </div>
                <br>
                <button id = "sign_up_button" type="submit">SUBMIT</button>
            </div>
        </form>
    </div>