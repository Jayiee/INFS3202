  function checkPasswordStrength(password) {
    var strength = 0;
  
    if (password.length < 2) {
      // Password is too short
      strength = 0;
    } else if (password.length >= 3 && password.length <= 4) {
      strength = 1;
    } else if (password.length >= 5 && password.length <= 7) {
      // Password is medium
      strength = 2;
    } else if (password.length > 7 && password.match(/[a-z]/) && password.match(/[A-Z]/) || password.match(/[0-9]/) || password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) {
      // Password is strong
      strength = 3;
    } else {
      strength = 2;
    }
  
    var passwordStrengthElement = document.getElementById('password-strength');
    passwordStrengthElement.innerHTML = 'Password Strength: ' + getStrengthText(strength);
  }
  
  function getStrengthText(strength) {
    switch (strength) {
      case 0:
        return 'Password should include a combination of uppercase and lowercase letters, numbers, and symbols.';
      case 2:
        return 'Medium';
      case 1:
        return 'Weak';
      case 3:
        return 'Strong';
      default:
        return '';
    }
  }

  



  