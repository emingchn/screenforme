$().ready(function(){
	jQuery.validator.addMethod(
		"userid", 
		function(value, element) {
			var chrnum = /^([a-zA-Z0-9]+)$/;  
			return this.optional(element) || (chrnum.test(value));  
		},
		"English alphabets and digits only!"
	);
	
	$("#registerform").validate({
		rules:{
			username:{
				required: true,
				minlength: 2,
				userid: true
			},
			password:{
				required: true,
				maxlength:32,
				minlength:6
			},
			repassword:{
				required: true,
				maxlength:32,
				minlength:6,
				equalTo:"#password"
			},
			email:{
				required: true,
				email:true
			},
		},
		messages:{
			username:{
				required: "Please enter username.",
				minlength: "At least 2 characters!"
			},
			password:{
				required: "Please enter password.",
				minlength: "At least 6 characters!"
			},
			repassword:{
				required: "Please re-enter password.",
				minlength: "At least 6 characters!",
				equalTo: "Not matched!"
			},
			email:"Please enter a valid email address."
		}
	});

	$("#loginform").validate({
		rules:{
			identifier:{
				required: true	
			},			
			password:{
				required: true
			},
		},
		messages:{
			identifier:{
				required: "Please enter username or email."
			},
			password:{
				required: "Please enter password."
			},
		}
	});
		
	$("#reset").validate({
		rules:{
			password:{
				required: true,
				maxlength:32,
				minlength:6
			},
			repassword:{
				required: true,
				maxlength:32,
				minlength:6,
				equalTo:"#password"
			},
		},
		messages:{
			password:{
				required: "Please enter password.",
				minlength: "At least 6 characters!"
			},
			repassword:{
				required: "Please re-enter password.",
				minlength: "At least 6 characters!",
				equalTo: "Not matched!"
			}
		}
	});
});