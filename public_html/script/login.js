$(function() {

	var authorize_url = "/5/public_html/login/authorize";
	var main_url = "/5/public_html";
	var username = "[name='username']";
	var password = "[name='password']";

	var login_error_div  = "#login-error";
	var login_form = "#login-main";

	var error_style_border = "#f00 solid 1px";


	$(username).keypress(function() {
		$(username).css("border","");
	});

	$(password).keypress(function() {
		$(password).css("border","");
	});


	$(login_form).on('submit', function(){

		if(!$(username).val() || !$(password).val()){
			
			if(!$(username).val()){
				$(username).css("border",error_style_border);
			}

			if(!$(password).val()){
				$(password).css("border",error_style_border);
			}

			$(login_error_div).hide(0);
			return false;
		}

		var content = $(this).serialize();
		
		$.ajax({

			url: authorize_url,
			dataType: 'json',
			type: 'post',
			data: content,
			success: function(data) {
				
				if(data.success == true){
						
					//window.location = main_url;
					window.location.replace(main_url);

				}else {

					//console.log(data.error);
					$(login_error_div).show(0);
					$(password).val("");
					$(login_error_div).html(data.error);

				}

			}

		});

		return false;

	});

});