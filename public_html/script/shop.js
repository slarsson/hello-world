var old = 0;

var start;

$(function() {

	$("#0").css("border","#ccc solid 1px");
	
	var path = window.location.pathname;
	if(path.match(/checkout/)){get_total();}
	
	if(!$("[name='filter']").length == 0) {

		$("option[value="+$("[name='filter']").data('select')+"]").attr('selected','selected');
	
	}

	$("[name='filter']").change(function() {
		
		if(location.href.match(/search/)){
			
			window.location = "?q="+$("[name='q']").data('search')+"&filter="+$(this).val();

		}else {
			
			window.location = "?filter="+$(this).val();

		}

	});


	$("[name='checkout']").on('submit', function(){

		$("#checkout-message").hide();

		var fields = ["[name='email']","[name='phone']","[name='firstname']","[name='lastname']","[name='street']","[name='zip']", "[name='city']"];
		var ok = false;

		$.each(fields, function(index, value){

			if(value == "[name='phone']"){

				$(".input-error1").remove();

				if(!$(value).val().trim().match(/^[0-9\-\+\(\)\ ]*$/)){
					
					$(value).css("border","1px solid #f00");
					$("#phone").after("<div class='user-input input-error1'><label></label><div class='input-error2'>Please enter a valid phone number</div></div>");
					ok = true;
					return;
				}
			}

			if(!$(value).val().trim()){
			
				$(value).css("border","1px solid #f00");
				
				ok = true;

			}else{

				$(value).css("border","");
			
			}

		});

		if(ok){

			$("#checkout-message").show().html("error..");

			return false;

		}

		$(".checkout").css("opacity","0.2");

	});



});

function img(url, id){
	
	$("#"+id).css("border","#ccc solid 1px");

	if(old != id){

		$("#"+old).css("border","#eeeded solid 1px");
	
	}

	$("#main-img").attr("src",url);


	old = id;

}

function qty_checkout(x, id){

	//var checkout_total = 0;
	
	var qty_id = "#q-"+id;

	var new_qty = qty(x, qty_id);

	$.ajax({

			url: "/5/public_html/shop/cart",
			dataType: 'json',
			type: 'post',
			data:  {'checkout': true, 'item': id, 'qty': new_qty},
			success: function(data) {

				get_total();

			}

	});

}

function qty(x, y){
	
	var y = y || "#q";
	
	var i = $(y).val();

	if(x == 0){

		if(!i.match(/^[0-9]*$/) || i == 0){i = 1;}

	}
	
	if(x == 1){

		if(i <= 1){return false;}

		i--;

	}

	if(x == 2){i++;}

	$(y).val(i);

	return i;

}

var update = true;
var show = false;

var empty = false;

function add(id){
	
	var qty = $("#q").val();

	$.ajax({

			url: "/5/public_html/shop/cart",
			dataType: 'json',
			type: 'post',
			data:  {'item': id, 'qty': qty},
			success: function(data) {
				
				var text = $("#add").html();

				$("#add").html("&#10003;").css("background-color","#a9d56b").show(1100);

				show = false;
				update = true;
				cart();

			}
	});

}

function cart(start){
	
	var start = start || 1;

	if(show){
		
		$(".cart-test").hide(100);
		show = false;

	}else {

		var empty = $("#total").html();

		if(!update && empty != 0){
		
			$(".cart-test").show(100);		
			show = true;
			
		}
		
		if(update){
		var item;
		
		$.getJSON("/5/public_html/shop/cart",function(data){

			var test = "";
			var tot = 0;
			var q = 0;

			$.each(data, function(x){

				q += +data[x].quantity;
				tot += +data[x].price*+data[x].quantity;

				test += "<div class='cart-flex'><div class='cart-test-2'><a href='"+data[x].url+"'>"+data[x].name+"</a><br><span>€"+data[x].price+" x "+data[x].quantity+"</span></div><div class='cart-remove' onclick='remove_item("+data[x].item_id+");'>&#215;</div></div>";
						
			});

			tot = Math.round(+tot * 100) / 100;

			$("#total").html(q);
			$("#total-sum").html("€"+tot);
			$("#cart-content").html(test);
			console.log(test);

			if(q == 0){
				$(".cart-test").hide(0);
				show = false;
				return false;
			}

			if(start != 0){
				$(".cart-test").show(100);		
				show = true;
			}


		});
		update = false;

		}
	}

}

function remove_item(id, checkout) {
	
	var checkout = checkout || false;

	var checkout_remove_total = 0;

	$.ajax({

			url: "/5/public_html/shop/cart",
			dataType: 'json',
			type: 'post',
			data:  {'remove': id},
			success: function(data) {

				if(checkout){
					
					$("#"+id).remove();
					get_total();

				}else {
				
					show = false;
					update = true;
					cart();

				}

			}

	});

}

var old_shipping = false;

function shipping(id){

	$.ajax({

		url: "/5/public_html/shop/cart/shipping",
		dataType: 'json',
		type: 'post',
		data:  {'shipping': id},
		success: function(data) {

			if(old_shipping == data.id){return;}

			$("#shipping-"+old_shipping).css("border","");
			$("#radio-"+old_shipping).prop("checked",false);
			
			old_shipping = data.id;

			get_total();
	
		}

	});

}

function get_total(){

		var total_to_pay = 0;
		var cart_value = 0;
		var string = "";

		$.getJSON("/5/public_html/shop/cart",function(data){
       		
			if(data.length == 0){

				window.location.replace("/5/public_html/shop/");

			}

       		$.each(data, function(x){

				cart_value += +data[x].price*+data[x].quantity;
				string += data[x].item_id+data[x].price+data[x].quantity;
						
			});

			$.getJSON("/5/public_html/shop/cart/shipping",function(data){
       			
				var shipping_data = $.parseJSON(JSON.stringify(data));

				cart_value = Math.round(+cart_value * 100) / 100;

       			total_to_pay = +cart_value + +shipping_data.price;

				$("#checkout-total").html("€"+cart_value);
				$("#fee").html("€"+shipping_data.price);
				$("#total_to_pay").html("€"+total_to_pay);

				$("#shipping-"+shipping_data.id).css("border","#ccc solid 1px");
				$("#radio-"+shipping_data.id).prop("checked",true);

				old_shipping = shipping_data.id;

				$("[name='order']").val(string+shipping_data.id);

			});

		});

}


