<header id="head" class="secondary">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h1>Interactions</h1>
			</div>
		</div>
	</div>
</header>
<div id="interactions">
	<section class="container">
		<div class="row">
			<?php foreach ($data['interactions'] as $interaction){ ?>
			<div class="col-md-12">
				<div class="featured-box project">
					<img src="http://localhost:8888/EWSD/img/image-1402201919689-V.jpg" />

					<div class="text">
						<h3><?php echo $interaction['project']->name ?></h3>
						<?php echo $interaction['project']->description ?>
					</div>
				</div>
				<h3 class="comment-title">Comments: </h3>

				<div class="comment-container">
					<?php foreach ($interaction['comments'] as $comment) { ?>
					<div class="comment">
						<span class="username"><strong>User:</strong><?php echo $comment->content ?></span>
					</div>
					<?php } ?>

				</div>
			</div>
			<?php } ?>
		</div>
	</section>
</div>
<!-- container -->

<!-- /container -->

