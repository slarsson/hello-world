<div class="wrapper">

<div class="main">

	<div class="page-nav">
		
		<a href="<?php echo URL."news"; ?>">NEWS</a>

		<img src="../test1.png">

		ADD NEW POST
	
	</div>

	<div id="new-post">

	<form action="authorize" method="post" id="new-post-form">

		<input type="text" name="headline" placeholder="title" autocomplete="off">

		<textarea name="content" placeholder="text"></textarea>

		<div class="news-submit">

			<div class="submit"><input type="submit" value="ADD POST"></div>

			<div id="status-box"></div>

		</div>

	</form>

	</div>

</div>

</div>