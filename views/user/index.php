<div class="wrapper">

<div class="main">

<div class="info">

<div class="user-info">

	<h1>YOUR ACCOUNT</h1>
	
	<h4><?php echo $this->user['username']; ?></h4>

</div>

	<ul>

	<?php foreach (navigation::sub_navbar() as $value): ?>

		<li <?php if($this->nav_id == $value['owner']){echo "id='on-user'";} ?>>

			<a href="<?php echo URL.$value['url']; ?>"><?php echo $value['name']; ?></a>

		</li>

	<?php endforeach; ?>

	</ul>

</div>

<div id="user-content">

	<?php include($this->content); ?>

</div>

<div class="clear"></div>

</div>

</div>