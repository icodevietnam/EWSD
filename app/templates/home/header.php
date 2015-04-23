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
    helpers\url::home_template_path().'js/bootstrap.min.js'));
    ?>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?php helpers\url::home_url() ?>images/logo.png" alt="Techro HTML5 template"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="fees.html">Fees</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="#">Dummy Link1</a></li>
                            <li><a href="#">Dummy Link2</a></li>
                            <li><a href="#">Dummy Link3</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>