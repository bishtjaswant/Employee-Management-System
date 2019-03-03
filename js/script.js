function validateForm(){
		let name = $("#name").val();
		let email = $("#email").val();
		let password = $("#password").val();
		let length = $("#password").val().length;
		if (name=='') {
			$('#name_error').addClass('text-danger');
			$('#name_error').html('<p >PLEASE ENTEER YOUR NAME </p>');
			return false;
		} 


		if (email=='') {

			$('#email_error').addClass('text-danger');
			$('#email_error').html('<p >PLEASE ENTEER YOUR EMAIL </p>');
			return false;
		}
	 

	    if (password=='') {

			$('#pass_error').addClass('text-danger');
			$('#pass_error').html('<p>PLEASE ENTEER YOUR PASSWORD </p>');
			return false;
		} 

		if (length < 8) {
			$('#pass_error').addClass('text-danger');
			$('#pass_error').html('<p>PASSWORD MUST BE EIGHT CHARACTERS LONG </p>');
			return false;	
		}





}