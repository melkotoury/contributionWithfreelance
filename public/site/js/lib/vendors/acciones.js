	function validateEmail(email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,15})?$/;
		if( !emailReg.test( email ) ) {
			return false;
		} else {
			return true;
		}
	}	
