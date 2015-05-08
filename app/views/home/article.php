
	<header id="head" class="secondary">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Courses</h1>
				</div>
			</div>
		</div>
	</header>
	<?php
	foreach($data['articles'] as $item)
	{
		echo $item->content;
	}
	?>
