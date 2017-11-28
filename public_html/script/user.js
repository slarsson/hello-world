$(function() {

	var div = "#edit";
	var authorize_url = "/5/public_html/user/authorize";

	var phone = "[name='phone']";
	var email = "[name='email']";

	var new_p  = "[name='new_password']";
	var confirm_p = "[name='confirm_new_password']";
	var old_p = "[name='old_password']";
	
	var fields = [new_p, confirm_p, old_p];
	var fields_id = ["#new_password", "#confirm_password", "#old_password"];

	var ok_text = "PROFILE UPDATED";
	var error_style_border = "#f00 solid 1px";

	$(div).on('submit', function(){
		
		$("#status").hide();
		$(".input-error1").remove();

		if($(new_p).length && $(confirm_p).length && $(old_p).length){
			
			$(new_p).add(confirm_p).add(old_p).css("border","");

			if($(new_p).val() && $(confirm_p).val() && $(old_p).val()){
				
				ok_text = "PASSWORD UPDATED";
			
			}else {
				
				$.each(fields, function(index, value){

					if(!$(value).val()){
						$(value).css("border",error_style_border);
						//$(fields_id[index]).after("<div class='user-input input-error1' id='error'><label></label><div class='input-error2'>This field is required</div></div>");
					}

				});

				return false;
			}

		}

		
		if($(email).length && $(phone).length){

			var ok = false;

			var val_phone = $(phone).val().trim();
			$(phone).add(email).css("border","");

			//email får inte vara tom
			if(!$(email).val().trim()){

				$(email).css("border",error_style_border);

				$("#email").after("<div class='user-input input-error1' id='error'><label></label><div class='input-error2'>Please enter a email address</div></div>");

				ok = true;

			}

			//regex för tel-nummer
			if(!(val_phone.match(/^[0-9\-\+\(\)\ ]*$/))){
			
				$(phone).css("border",error_style_border);

				$("#phone").after("<div class='user-input input-error1'><label></label><div class='input-error2'>Please enter a valid phone number</div></div>");

				ok = true;

			}
		
			if(ok){return false;}

		}

		var content = $(this).serialize();
		console.log(content);

		$.ajax({

			url: authorize_url,
			dataType: 'json',
			type: 'post',
			data: content,
			success: function(data) {
				
				console.log(data.success);
				if(data.error == 4){
					
					$(old_p).css("border",error_style_border);

					$("#old_password").after("<div class='user-input input-error1'><label></label><div class='input-error2'>Wrong password</div></div>");

				}

				if(data.error == 3){
					
					$(new_p).css("border",error_style_border);
					$(confirm_p).css("border",error_style_border);

					$("#confirm_password").after("<div class='user-input input-error1'><label></label><div class='input-error2'>Passwords does not match</div></div>");

				}


				if(data.success == "true" || data.error == 2){
					
					$("#status").html(ok_text);
					$("#status").show(0);

					$(old_p).val("");///error???

				}
			}

		});

		return false;

	});

});