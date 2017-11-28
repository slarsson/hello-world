<div class="wrapper">
<div class=" main">


	<h1>latest news</h1><br>

	<?php foreach($this->news as $article): ?>

	<div class="news-post" style="max-width:400px;">
	
	
	
		<div class="news-date"><?php echo $article['time']; ?></div>
		
		<a href="<?php echo URL.'news/'.$article['link_id']; ?>" class="news-a">
			
			<h1><?php echo $article['headline']; ?></h1>
		
		</a>

		<p><?php echo $article['content']; ?> <a href="<?php echo URL.'news/'.$article['link_id']; ?>" class="news-post-a">Read more &rsaquo;</a></p>
	

	</div>

	<?php endforeach; ?>
	
































	<!--<input type="text" style="max-width:300px; margin-bottom:10px; margin-top:200px;">

	<div class="submit"><input type="submit" value="btn" style="max-width:100px;"></div>

	<h1>h1 headline</h1>
	<h2>h2 headline</h2>
	<h3>h3 headline</h3>
	<p>Aliquam condimentum eu arcu id luctus. Nunc varius odio id ex volutpat posuere. Phasellus metus odio, porta non ultricies ac, porta eget metus. Donec auctor enim ac sem malesuada laoreet. Suspendisse sed condimentum ex. Cras iaculis finibus commodo. Cras magna massa, facilisis sit amet metus nec, suscipit aliquam lacus. Sed ullamcorper ligula erat, id rutrum arcu pulvinar at. Sed sit amet lorem a turpis ultricies condimentum. Quisque euismod orci ligula, ut cursus sapien auctor eget. Quisque malesuada, tortor gravida sagittis tincidunt, ipsum augue elementum metus, at condimentum elit ligula eu nulla. Sed sodales molestie ex, eget vulputate turpis elementum quis. Praesent pellentesque, justo non ultrices venenatis, lorem dui viverra magna, et sagittis erat libero a sem. Mauris aliquet enim eros, volutpat dapibus sapien molestie in. Aliquam feugiat est sapien, et blandit augue imperdiet.</p>-->


</div>
</div>