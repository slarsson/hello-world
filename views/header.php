<header>

	<a href="/5/public_html">
		
		<img src="<?php echo URL; ?>media/vafan2.png">

		<h1>BOKOHARAM</h1>
	
	</a>

	<nav>

	<ul>

	<?php foreach ($nav as $value): ?>

		<li <?php if($this->page_id == $value['controller']){echo "id='on'";} ?>>

			<a href="<?php echo URL.$value['url']; ?>"><?php echo $value['name']; ?></a>

		</li>

	<?php endforeach; ?>

	</ul>

	</nav>

</header>