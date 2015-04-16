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
    	helpers\assets::css(array(
    		helpers\url::admin_template_path().'css/bootstrap.min.css',
    		helpers\url::admin_template_path().'css/sb-admin.css',
    		helpers\url::admin_template_path().'css/morris.css',
    		helpers\url::admin_template_path().'css/font-awesome.min.css',
    		helpers\url::admin_template_path().'css/style.css'
    	));
    ?>
</head>
