<div class="wrapper">

<div class="main">

	<div class="page-nav">
		
		<a href="<?php echo URL."news"; ?>">NEWS</a>

		<img src="<?php echo URL ?>test1.png">

		<a href="<?php echo URL."news/edit"; ?>">EDIT</a>

		<img src="<?php echo URL ?>test1.png">

		<div id="headline"><?php echo $this->news['headline']; ?></div>
	
	</div>

	<div id="new-post">

	<form action="../authorize?type=edit" method="post" id="edit-post-form">

	<div class="edit-top">

		<input type="text" name="id" value="<?php echo $this->news['news_id']; ?>" class="readonly" style="max-width:60px; margin-bottom:0px;" readonly>

		<div class="edit-info">

			<div class="edit-info-item"><?php echo $this->news['timestamp']; ?> <span><?php echo $this->news['username']; ?></span></div>

			<a href="<?php echo URL; ?>news/edit/?remove=<?php echo $this->news['news_id']; ?>">&#215;</a>

		</div>

	</div>

		<input type="text" name="headline" placeholder="title" autocomplete="off" value="<?php echo $this->news['headline']; ?>">

		<textarea name="content" placeholder="text"><?php echo $this->news['raw_content']; ?></textarea>

		<div class="news-submit">

			<div class="submit"><input type="submit" value="SAVE CHANGES"></div>

			<div id="status-box"></div>

		</div>

	</form>

	</div>

</div>

</div>