<div class="wrapper">

<div class="main">

	<div class="page-nav">
		
		<a href="<?php echo URL."news"; ?>">NEWS</a>

		<img src="<?php echo URL ?>test1.png">

		<a href="<?php echo URL."news/edit"; ?>">EDIT</a>

		<img src="<?php echo URL ?>test1.png">

		REMOVE POST
	
	</div>

	<div id="remove">

		<form action="../authorize?type=remove" method="post" id="remove-form">

			<input type="text" name="remove" value="<?php echo $this->news['news_id']; ?>" class="readonly" style="max-width:100px;" readonly>
			<input type="text"value="<?php echo $this->news['headline']; ?>" class="readonly" style="max-width:400px; margin-bottom:10px;" readonly>
		

			<div class="submit"><input type="submit" value="confirm" style="width:auto;"></div>

		</form>

	</div>

</div>

</div>