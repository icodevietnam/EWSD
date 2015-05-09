<!-- Header -->
<header id="head">
	<div class="container">
		<div class="banner-content">
			<div id="da-slider" class="da-slider">
				<div class="da-slide">
					<h2>Educational Website</h2>

					<p>Amazing free responsive website for free, enjoy!!!</p>

					<div class="da-img"></div>
				</div>
				<div class="da-slide">
					<h2>Online Education</h2>

					<p>Bootstrap is a powerful mobile first front-end framework..</p>

					<div class="da-img"></div>
				</div>
				<div class="da-slide">
					<h2>Super Success</h2>

					<p>HTML5 is a markup language used for structuring and presenting Web.</p>

					<div class="da-img"></div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- /Header -->

<div class="container">
<?php
foreach ($data['articles'] as $item)
{
	echo $item->content;
}
?>
	</div>