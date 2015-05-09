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
			<div class="col-md-12 interaction">
				<div class="featured-box project">
					<img src="<?php echo '/EWSD/'.$interaction['project']->path.$interaction['project']->file_name ?>" />

					<div class="text">
						<h3><?php echo $interaction['project']->name ?></h3>
						<?php echo $interaction['project']->description ?>
					</div>
				</div>
				<h3 class="comment-title">Comments: </h3>

				<div class="comment-container">
					<?php foreach ($interaction['comments'] as $comment) { ?>
					<div class="comment">
						<span class="username"><strong><?php echo $comment->username ?>: </strong><?php echo $comment->content ?></span>
					</div>
					<?php } ?>

				</div>
				<form id="commentProject-<?php echo $interaction['project']->id ?>" action="/EWSD/comment/save" method="post" class="">
					<div class="form-group">
						<input type="hidden" id="projectId" name="projectId" value="<?php echo $interaction['project']->id ?>"/>
						<label for="txtComment">Say something:</label>
						<input id="txtComment" name="txtComment" class="form-control"/>
					</div>
					<button type="submit" class="btn btn-info">Send comment</button>
				</form>
			</div>
			<?php } ?>
		</div>
	</section>
</div>
<!-- container -->

<!-- /container -->

