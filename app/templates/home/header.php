<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE ?>" >
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'].' - '.SITETITLE ?></title>
    <link rel="favicon" href="<?php helpers\url::home_url() ?>images/favicon.png">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <?php
    	helpers\assets::css(array(
    		helpers\url::home_template_path().'css/bootstrap.min.css',
    		helpers\url::home_template_path().'css/font-awesome.min.css',
            helpers\url::home_template_path().'css/da-slider.css',
    		helpers\url::home_template_path().'css/style.css'
    	));
    ?>
    <?php 
    \helpers\assets::js(array(
    helpers\url::home_template_path().'js/jquery.js',
    helpers\url::home_template_path().'js/bootstrap.min.js',
	helpers\url::home_template_path().'js/home.js'));
    ?>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?php helpers\url::home_url() ?>images/logo.png" alt=""></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li class="active"><a href="home">Home</a></li>
                    <li><a href="about">About</a></li>
					<li><a href="article">Article</a></li>
					<li><a href="interactions">Interactions</a></li>
                    <li><a href="courses">Courses</a></li>
                    <li><a href="fees">Fees</a></li>
                    <li><a href="portfolio">Portfolio</a></li>
                    <li><a href="contact">Contact</a></li>
					<li><a id="login-link" href="" data-toggle="modal" data-target="#login-modal">Login</a></li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

	<div class="modal fade" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="save-form" action="loginHomeProcess" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Login</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="username">Username: </label>
							<input id="username" name="username" class="form-control" type="text" placeholder="Enter username" required />
						</div>
						<div class="form-group">
							<label for="password">Password: </label>
							<input id="password" name="password" class="form-control" type="password" placeholder="Enter password" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div><!-- /.modal -->