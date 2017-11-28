<script src="https://js.braintreegateway.com/js/braintree-2.21.0.min.js"></script>
<script>

	braintree.setup("<?php echo $this->token; ?>", "dropin", {container: "payment"});

	window.onresize = align;
	//window.onload = align;
	$(function() {align();});

	function align(){

		var h = $( window ).height();

		var test = (h-500)/3;

		if(test < 20){test = 1;}

		$("#swag1").css("margin-top", test);

	}

</script>


<div class="wrapper" style="">
<div class="main" style="max-width:400px;">

	<div id="swag1">

		<div id="total-payment">€<?php echo $this->total; ?></div>

		<form method="post" action="">

			<div id="payment"></div>

			<input type="submit" class="confirm" value="CONFIRM AND PAY">

		</form>

	</div>

</div>
</div>

