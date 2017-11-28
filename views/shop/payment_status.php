<div class="wrapper">
<div class="main">

	ORDER SUCCESSFULLY!

	<br>

	Your ordernumber is: <?php echo $this->order['order_id']; ?>

	<br>

	Ship to: <?php echo $this->order['shipping_firstname']; ?> <?php echo $this->order['shipping_lastname']; ?> : <?php echo $this->order['shipping_street']; ?> , <?php echo $this->order['shipping_city']; ?> <?php echo $this->order['shipping_zip']; ?>  
	

</div>
</div>