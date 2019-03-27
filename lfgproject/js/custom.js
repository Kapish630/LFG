$(document).ready(function(){
	$("#dropSignup").click(function(){
		$("#login").hide();
		$("#signup").show("fade", 500);
	});
	$("#dropLogin").click(function(){
		$("#signup").hide();
		$("#login").show("fade", 500);
	});
	
	$("#form_login").submit(function(){
		var loginEmail = $("#login_email").val();
		var loginPassword = $("#login_password").val();
		$.ajax({
			url: "includes/system/login.php",
			type: "POST",
			data: "email=" + loginEmail + "&password=" + loginPassword,
			success: function(info) {
				$("#registration").hide().html(info).show("fade", 500);
			}
		});
	});
	$("#form_signup").submit(function(){
		var signupUsername = $("#signup_username").val();
		var signupEmail = $("#signup_email").val();
		var signupPassword = $("#signup_password").val();
		var signupCornfirmPassword = $("#signup_confirmpassword").val();
		$.ajax({
			url: "includes/system/signup.php",
			type: "POST",
			data: "username=" + signupUsername + "&email=" + signupEmail + "&password=" + signupPassword + "&confirmpassword=" + signupCornfirmPassword,
			success: function(info) {
				$("#registration").hide().html(info).show("fade", 500);
			}
		});
	});
});