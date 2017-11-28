<div class="wrapper">
<div class=" main">

<div class="checkout">

<h1>1. Shopping cart</h1>

<?php foreach ($this->cart as $data): ?>

	<div class="cart-checkout-item" id="<?php echo $data['item_id']; ?>">

		<img class="image img-checkout" src="<?php echo URL_MEDIA.$data['img']; ?>">

		<div class="checkout-item-name"><?php echo $data['name']; ?></div>

		<div class="qty-container" style="margin-top:0;">

			<div class="qty" onclick="qty_checkout(1, <?php echo $data['item_id']; ?>);">&#8722;</div>
									
				<input type="text" value="<?php echo $data['quantity']; ?>" id="q-<?php echo $data['item_id']; ?>" onchange="qty_checkout(0, <?php echo $data['item_id']; ?>);">
								
			<div class="qty" onclick="qty_checkout(2, <?php echo $data['item_id']; ?>);">&#43;</div>

		</div>

		<div class="cart-checkout-price">€<?php echo $data['price']; ?></div>

		<div class="cart-remove" onclick="remove_item(<?php echo $data['item_id']; ?>, true);">&#215;</div>

	</div>

<?php endforeach; ?>
	
	<div class="checkout-total-box">

		<div class="total-row">Shopping cart <div id="checkout-total">€0</div></div>

		<div class="total-row">Shipping fee <div id="fee">€0</div></div>

		<div class="total-row">Total amount to pay <div id="total_to_pay">€0</div></div>

	</div>

<h1>2. Shipping address</h1>


	<form name="checkout" method="post" action="<?php echo URL; ?>shop/checkout/payment">
	
<div class="checkout-address">

	<div class="user-input">

		<label for="x">Email</label>

		<input type="text" name="email" value="<?php echo $this->user['email']; ?>">

	</div>

	<div class="user-input" id="phone">

		<label for="x">Phone Number</label>

		<input type="text" name="phone" value="<?php echo $this->user['phone']; ?>">

	</div>

	<br>

	<div class="user-input">

		<label for="x">Firstname</label>

		<input type="text" name="firstname" value="<?php echo $this->user['firstname']; ?>">

	</div>

	<div class="user-input">

		<label for="x">Lastname</label>

		<input type="text" name="lastname" value="<?php echo $this->user['lastname']; ?>">

	</div>

	<div class="user-input">

		<label for="x">Street</label>

		<input type="text" name="street" value="<?php echo $this->user['street']; ?>">

	</div>

	<div class="user-input">

		<label for="x">Zip-code</label>

		<input type="text" name="zip" value="<?php echo $this->user['zip']; ?>">

	</div>

	<div class="user-input">

		<label for="x">City</label>

		<input type="text" name="city" value="<?php echo $this->user['city']; ?>">

	</div>
</div>




	<h1>3. shipping method</h1>

<div class="shipping">

	<?php foreach ($this->shipping as $data): ?>

	<div class="shipping-item" id="shipping-<?php echo $data['id']; ?>" onclick="shipping(<?php echo $data['id']; ?>);">

			<input type="radio" id="radio-<?php echo $data['id']; ?>">

			<div class="shipping-info">

				<?php echo $data['name']; ?>

				<br>

				€<?php echo $data['price']; ?>

			</div>

		<div class="clear"></div>
		
	</div>

	<?php endforeach; ?>

</div>
	
	<div id="checkout-message"></div>

		<input type="hidden" name="order" value="true">
		<input type="submit" class="confirm" value="PLACE ORDER">

	</form>

</div>

<br>
<br>
<br>

</div>
</div>