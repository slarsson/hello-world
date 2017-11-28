<div class="wrapper">
<div class=" main">

<h1 class="x">WEBSHOP</h1>

	<?php include($this->content); ?>

	<div class="clear"></div>
	
	<div id="top-info-shop">

		<div id="search">

			<form type="get" action="<?php echo URL; ?>shop/search/">
			
				<input type="text" name="q" placeholder="search" value="<?php echo $this->query; ?>" data-search="<?php echo $this->query_encode; ?>">

			
			</form>
		

		</div>

		<div id="filter">

			<select name="filter" data-select="<?php echo $this->filter; ?>">

				<option value="default">LATEST</option>

				<option value="desc">PRICE DESC</option>

				<option value="asc">PRICE ASC</option>

				<option value="name">NAME</option>

			</select>

		</div>

	</div>

	<div id="shop-text">

	<?php echo $this->msg; ?>

	</div>

	<div id="shop-items">

<?php foreach($this->item as $data): ?>

		<div class="shop">

			<a href="<?php echo URL."shop/item/".$data['item_id']."/".$data['item_link']; ?>/"><img class="image" src="<?php echo URL_MEDIA.$data['url'];?>"></a>

			<a href="<?php echo URL."shop/item/".$data['item_id']."/".$data['item_link']; ?>/"><?php echo $data['name']; ?></a> 
	
			<div class="price">€<?php echo $data['price']; ?></div>

		</div>

<?php endforeach; ?>

	</div>

<div id="page">

	<?php echo navigation::pagination($this->page, 16, $this->rows); ?>

</div>

</div>
</div>