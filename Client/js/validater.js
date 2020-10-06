$(function() {

	$("#firstname_error_message").hide();
	$("#lastname_error_message").hide();

	$("#password_error_message").hide();
	$("#retype_password_error_message").hide();
	$("#email_error_message").hide();

	var error_firstname = false;
	var error_lastname = false;
	var error_password = false;
	var error_retype_password = false;
	var error_email = false;

	$("#form_firstname").focusout(function() {

		check_firstname();
		
	});
	
	$("#form_lastname").focusout(function() {

		check_lastname();
		
	});
	
	$("#form_password").focusout(function() {

		check_password();
		
	});

	$("#form_retype_password").focusout(function() {

		check_retype_password();
		
	});

	$("#form_email").focusout(function() {

		check_email();
		
	});

	function check_firstname() {
	
		var firstname_length = $("#form_firstname").val().length;

		var pattern = new RegExp(/[a-zA-Z]/);

		if(pattern.test($("#form_firstname").val())) {
			$("#firstname_error_message").hide();
		} else {
			$("#firstname_error_message").html("Invalid firstname structure It should contain letters only");
			$("#firstname_error_message").show();
			error_firstname = true;
		}
		
		if(firstname_length < 5 || firstname_length > 20) {
			$("#firstname_error_message").html("Should be between 5-20 characters");
			$("#firstname_error_message").show();
			error_firstname = true;
		} else {
			$("#firstname_error_message").hide();
		}
	
	}

	function check_lastname() {
	
		var lastname_length = $("#form_lastname").val().length;

		var pattern = new RegExp(/[a-zA-Z]/);

		if(pattern.test($("#form_lastname").val())) {
			$("#lastname_error_message").hide();
		} else {
			$("#lastname_error_message").html("Invalid lastname structure It should contain letters only");
			$("#lastname_error_message").show();
			error_lastname = true;
		}
		
		if(lastname_length < 5 || lastname_length > 20) {
			$("#lastname_error_message").html("Should be between 5-20 characters");
			$("#lastname_error_message").show();
			error_lastname = true;
		} else {
			$("#lastname_error_message").hide();
		}
	
	}

	function check_password() {
	
		var password_length = $("#form_password").val().length;
		
		if(password_length < 8) {
			$("#password_error_message").html("At least 8 characters");
			$("#password_error_message").show();
			error_password = true;
		} else {
			$("#password_error_message").hide();
		}
	
	}

	function check_retype_password() {
	
		var password = $("#form_password").val();
		var retype_password = $("#form_retype_password").val();
		
		if(password !=  retype_password) {
			$("#retype_password_error_message").html("Passwords don't match");
			$("#retype_password_error_message").show();
			error_retype_password = true;
		} else {
			$("#retype_password_error_message").hide();
		}
	
	}

	function check_email() {

		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	
		if(pattern.test($("#form_email").val())) {
			$("#email_error_message").hide();
		} else {
			$("#email_error_message").html("Invalid email address");
			$("#email_error_message").show();
			error_email = true;
		}
	
	}

	$("#registration_form").submit(function() {
											
		error_firstname = false;
		error_lastname = false;

		error_password = false;
		error_retype_password = false;
		error_email = false;
											
		check_firstname();
		check_lastname();

		check_password();
		check_retype_password();
		check_email();
		
		if(error_firstname == false && error_lastname == false && error_password == false && error_retype_password == false && error_email == false) {
			return true;
		} else {
			return false;	
		}

	});

});