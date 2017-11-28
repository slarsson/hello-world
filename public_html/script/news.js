$(function() {

	if(!$("#remove").length == 0){
		var div = "#remove-form";
		var type = "remove";
	}
	
	if(!$("#new-post-form").length == 0){
		var div = "#new-post-form";
		var type = "new";
	}

	if(!$("#edit-post-form").length == 0){
		var div = "#edit-post-form";
		var type = "edit";
		//alert("ok");
	}

	var authorize_url = "/5/public_html/news/authorize?type="+type;

	var title = "[name='headline']";
	var text = "[name='content']";
	var fields = [title, text];

	var error_style_border = "#f00 solid 1px";

	$(title).keypress(function() {
		$(title).css("border","");
	});

	$(text).keypress(function() {
		$(text).css("border","");
	});


	$(div).on('submit', function(){

	if(type != "remove"){

		$("#status-box").hide(0);

		if(!$(title).val().trim() || !$(text).val().trim()){

			$.each(fields, function(index, value){

				if(!$(value).val().trim()){
			
					$(value).css("border",error_style_border);
			
				}

			});

			return false;

		}

	}

		var content = $(this).serialize();
		console.log(content);

		$.ajax({

			url: authorize_url,
			dataType: 'json',
			type: 'post',
			data: content,
			success: function(data) {
				
				if(data.success == false){
					
					alert("error");
				
				}else {
					
					if(type == "new"){
						
						$("#status-box").html("POST ADDED <a href='"+data.link_id+"'>"+data.link_id+"</a>");
						$("#status-box").show(0);

						//alert(data.link_id);
					
						$(title).val("");
						$(text).val("");

					}

					if(type == "edit"){

						$("#status-box").html("POST UPDATED");
						$("#status-box").show(0);

						$(title).val(data.name);
						$("#headline").html(data.name);
						$(text).val(data.content);

					}

					if(type == "remove"){

						$("#remove").html("THE POST HAS BEEN REMOVED &#10003;");

					}

				}

			}
		});
	
	return false;

	});

});