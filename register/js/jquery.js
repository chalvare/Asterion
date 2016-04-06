
	$(function() {
		//$("#success-alert").hide();
		
	    $('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
	
	});
	
	$(function() {
	    $('#register-submit').click(function(e) {
			var pass = $("#passwordR").val();
	 		var passC = $("#confirm-passwordR").val();
	 		if(pass==passC){
		 	}else{
		 		alert('Las contraseñas deben coincidir');	
	 		}
		});
	
	});
	
	/*$(document).ready(function(){
		 $("#success-alert").hide();
	});*/
	
	$(document).ready(function() {
		$("#success-alert").hide();
		$('#login-submit').on('click',function showAlert() {
			$('#success-alert').alert();
			$('#success-alert').show()		
			});
	});
