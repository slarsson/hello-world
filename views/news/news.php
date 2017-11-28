<div class="wrapper">

<div class="main">

	<div class="page-nav">
		
		<a href="<?php echo URL."news"; ?>">NEWS</a>

		<img src="<?php echo URL; ?>test1.png">

		<?php echo $this->news['headline']; ?>
	
	</div>

	<div class="news-post-2">
		
		<div class="news-date" title="##"><?php echo $this->news['time_ago']; ?></div>

		<h1><?php echo $this->news['headline']; ?></h1>

		<p><?php echo $this->news['content']; ?></p>

	</div>

	<div class="news-post-side">

		<div class="news-date"><?php echo $this->news['date']; ?></div>
		<div class="news-date"><?php echo $this->news['time']; ?> (UTC+1)</div>
		
		<?php echo $this->news['username']; ?>

	</div>

	<div class="clear"></div>

</div>

</div>