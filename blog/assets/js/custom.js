$(document).ready(function(){

	//register user ajax 
	$("#register-btn").click(function(e){
		if ($("#register-form")[0].checkValidity()) {
			e.preventDefault();
			$("#register-btn").val('Please Wait..');
				if ($("#rpassword").val() != $("#cpassword").val()) {
					$("#passError").text('* Password did not matched! ');
					$("#register-btn").val('Sign Up');
				}else{
					$("#passError").text('');
					$.ajax({
						url : "assets/php/action.php",
						method : "POST",
						data : $("#register-form").serialize()+ '&action=register',
						success : function(response){
							$("#register-btn").val('Sign Up'); 
							if(response === 'register'){
								window.location = 'index.php';
							}else{
								$("#regAlert").html(response);
							}
						}

					});
				}
		}
	});

	//login 

	$("#login-btn").click(function(e){
		if($("#login-form")[0].checkValidity()) {
			e.preventDefault();
			$("#login-btn").val('Please Wait..');
			$.ajax({
				url : 'assets/php/action.php',
				method : 'post',
				data : $("#login-form").serialize()+'&action=login',

				success : function(response){
					$("#login-btn").val('Sing In');
					console.log(response);
					if(response === 'login'){
					   window.location = 'home.php';
					}else{
						$("#loginAlert").html(response);
					}

					
					
				}
			});
		}
	});
	//end login

	//forgot password with ajax

	$("#forgot-btn").click(function(e) {
		if($("#forgot-form")[0].checkValidity()){
			e.preventDefault();
			$("#forgot-btn").val('Please Wait..');
			$.ajax({
				url : 'assets/php/action.php',
				method : 'POST',
				data : $("#forgot-form").serialize()+'&action=forgot',

				success:function(response){
					console.log(response);
					 $("#forgot-btn").val('Forgot Password');
					 $("#forgot-form")[0].rest();
					 $("#forgotAlert").html(response);
				}
			});
		}
	});
	//forgot password end
});