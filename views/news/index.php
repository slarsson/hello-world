<div class="wrapper">

<div class="main">
	
	<h1>news</h1><br>
	
	<?php foreach($this->news as $article): ?>

	<div class="news-post">
	
	
	
		<div class="news-date"><?php echo $article['time']; ?></div>
		
		<a href="<?php echo URL.'news/'.$article['link_id']; ?>" class="news-a">
			
			<h1><?php echo $article['headline']; ?></h1>
		
		</a>

		<p><?php echo $article['content']; ?> <a href="<?php echo URL.'news/'.$article['link_id']; ?>" class="news-post-a">Read more &rsaquo;</a></p>
	

	</div>

	<?php endforeach; ?>

	<div id="page">
	
		<?php echo navigation::pagination($this->page, $this->posts,  navigation::count_rows("news")); ?>

	</div>

</div>

</div>