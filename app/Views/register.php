	<body id = "index">
		
		<div id = "sign_up">
			<h1 id = "sign_up_title">REGISTER</h1>
			<hr>
			<p id ="create_account">Create Your Account</p>
			<?php echo form_open(base_url().'register/create_account'); ?>
				<div id="register_form">
					<p><input id = "signup_input" type="text"  name="username" size="35" maxlength="20" placeholder="  Username" pattern="[a-zA-Z0-9_]+" title="Username should only contain letters, numbers and underscores." required></p>
					<p><input id = "signup_input" type="email"  name="useremail" size="35" maxlength="35" placeholder="  Email" required></p>
					<p>			    
					<?php 
                    	echo $error; 
                	?>
					</p>
					<p><input id = "password" type="password" name="password" value="" size="35" placeholder="  Password" onkeyup="checkPasswordStrength(this.value)" required></p>
					<div id="password-strength"></div>
					<p><input id = "confirmPassword" type="password" name="confirmPassword" value="" size="35" maxlength= "15" placeholder="  Confirm Password" required></p>
					<div id="password-error-message"></div>
					<br>
					<button id = "sign_up_button" type="submit">CREATE ACCOUNT</button>
				</div>
			</form>
			
			<p id = "signIn_logIn">Already have an account? <a href = "login">Login In</a></p>
		</div>
		<script>
			// 获取密码输入框和确认密码输入框的元素
			var password = document.getElementById("password");
			var confirm_password = document.getElementById("confirmPassword");
			const errorMessage = document.getElementById("password-error-message");

			// 当确认密码输入框的值发生改变时，检查两个密码是否匹配
			confirm_password.addEventListener("input", () => {
			if (password.value !== confirm_password.value) {
				errorMessage.textContent = "Passwords do NOT Match";
			} else {
				errorMessage.textContent = "Passwords Match";
			}
			});
		</script>
		

