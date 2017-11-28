<div class="wrapper">
<div class="main">
<?php //var_dump($this->item); ?>
	<div class="page-nav x">

		<a href="<?php echo URL; ?>shop">SHOP</a>

		<img src="<?php echo URL; ?>test1.png">

		<a href="<?php echo URL; ?>shop">test</a>

		<img src="<?php echo URL; ?>test1.png">

		<?php echo $this->item['name']; ?>

	</div> 

	<?php include($this->content); ?>

<div class="clear"></div>

	<div class="shop large">
		
		<h1><?php echo $this->item['name']; ?></h1>

			<div class="shop-content">
				
					<img id="main-img" class="image" src="<?php echo URL_MEDIA.$this->item['img'][0]; ?>">

				<div class="shop-info">

					<div class="price-2">€<?php echo $this->item['price']; ?></div>

						<div class="img-container">
						
						<?php $i = 0; foreach($this->item['img'] as $data): ?>

							<img id="<?php echo $i; ?>" class="image small" src="<?php echo URL_MEDIA.$data; ?>" onclick="img('<?php echo URL_MEDIA.$data; ?>', this.id);">

						<?php $i++; endforeach; ?>
						
						</div>

						<div class="shop-options">

						
							<select name="x" placeholder="swg">

								<option value="1">?</option>

								<option value="1">?</option>

								<option value="1">?</option>

							</select>

							
							<div class="qty-container">

								<div class="qty" onclick="qty(1);">&#8722;</div>
									
									<input type="text" value="1" id="q" onchange="qty(0);">
								
								<div class="qty" onclick="qty(2);">&#43;</div>

							</div>

							<div id="add" class="add-to-cart" onclick="add(<?php echo $this->item['item_id']; ?>);">ADD TO CART</div>

						</div>

					<p>In mollis ornare erat non pellentesque. Phasellus eget scelerisque tortor, ut faucibus eros. Mauris augue metus, ultricies eu magna vel, venenatis feugiat nulla. Nunc consectetur non nisl quis sagittis. </p>

					

				</div>

			</div>

	</div>


</div>
</div>