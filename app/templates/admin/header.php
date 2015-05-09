<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE ?>" >
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'].' - '.SITETITLE ?></title>
    <?php
        $currentUser = helpers\session::get('user');
        if($currentUser == null || ($currentUser->role_name != 'admin' && $currentUser->role_name != 'staff')){
            helpers\url::redirect('EWSD/login');
        }
    ?>
    <?php
    	helpers\assets::css(array(
    		helpers\url::admin_template_path().'css/bootstrap.min.css',
    		helpers\url::admin_template_path().'css/morris.css',
    		helpers\url::admin_template_path().'css/font-awesome.min.css',
            helpers\url::admin_template_path().'css/sb-admin.css',
            helpers\url::admin_template_path().'css/editor.css',
            helpers\url::admin_template_path().'css/formhelpers.css',
    		helpers\url::admin_template_path().'css/style.css'
    	));
    ?>

    <?php 
    \helpers\assets::js(array(
    helpers\url::admin_template_path().'js/jquery.js',
    helpers\url::admin_template_path().'js/bootstrap.min.js',
    helpers\url::admin_template_path().'js/bootbox.min.js',
    helpers\url::admin_template_path().'js/editor.js',
    helpers\url::admin_template_path().'js/formhelpers.js',
    helpers\url::admin_template_path().'js/validation.min.js',
    helpers\url::admin_template_path().'js/common.js',
    ));
    ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">eSupervisor</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php 
                        $user = helpers\session::get('user',false);
                        echo $user;
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $user->username.'[ Role:'.$user->role_name.' ]' ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php helpers\url::root_page() ?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if($data['key']=='dashboard') 
                            echo "class='active'";
                        ?> >
                        <a href="<?php helpers\url::root_page() ?>admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if($data['key']=='account' || $data['key']=='role') 
                            echo "class='active'";
                        ?> >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Account Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php helpers\url::root_page() ?>admin/account">Account</a>
                            </li>
                            <?php 
                        $currentUser = helpers\session::get('user');
                        if($currentUser->role_name != 'staff')
                        {
                    ?>
                            <li>
                                <a href="<?php helpers\url::root_page() ?>admin/role">Role</a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <li <?php if($data['key']=='course') 
                            echo "class='active'";
                        ?>>
                        <a href="<?php helpers\url::root_page() ?>admin/course"><i class="fa fa-fw fa fa-folder-open-o"></i> Course</a>
                    </li>
                    <li <?php if($data['key']=='article') 
                            echo "class='active'";
                        ?>>
                        <a href="<?php helpers\url::root_page() ?>admin/article"><i class="fa fa-fw fa-pencil"></i> Article</a>
                    </li>
                    <li <?php if($data['key']=='file') 
                            echo "class='active'";
                        ?>>
                        <a href="<?php helpers\url::root_page() ?>admin/file"><i class="fa fa-fw fa-file"></i> File</a>
                    </li>
                    <li <?php if($data['key']=='project') 
                            echo "class='active'";
                        ?>>
                        <a href="<?php helpers\url::root_page() ?>admin/project"><i class="fa fa-fw fa-paper-plane-o"></i> Project</a>
                    </li>
                    <li <?php if($data['key']=='interactions')
                            echo "class='active'";
                        ?>>
                        <a href="<?php helpers\url::root_page() ?>admin/interactions"><i class="fa fa-fw fa-plus-square"></i> Interaction</a>
                    </li>
                    <li <?php if($data['key']=='assignation')
                            echo "class='active'";
                        ?>>
                        <a href="<?php helpers\url::root_page() ?>admin/assignation"><i class="fa fa-fw fa-tag"></i> Assignation</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    <div id='page-wrapper'>
        <div class='container-fluid'>
