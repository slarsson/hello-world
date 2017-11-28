<div class="wrapper">

<div class="main">


	<div class="page-nav">
		
		<a href="<?php echo URL."news"; ?>">NEWS</a>

		<img src="<?php echo URL ?>test1.png">

		EDIT

	</div>

	<div class="edit">

<?php foreach($this->news as $data): ?>

	<div class="edit-item">

		<a href="<?php echo URL; ?>news/edit/?id=<?php echo $data['news_id']; ?>" class="a-edit"><?php echo $data['headline']; ?></a>

		<span><?php echo $data['timestamp']; ?></span>

		<a href="<?php echo URL; ?>news/edit/?remove=<?php echo $data['news_id']; ?>">&#215;</a>

	</div>

<?php endforeach; ?>

	</div>

	<div id="page">
	
		<?php echo navigation::pagination($this->page, $this->posts, navigation::count_rows("news")); ?>

	</div>

</div>

</div>