<!-- End Page Wrapper -->
</div>
<?php 
\helpers\assets::js(array(
	helpers\url::admin_template_path().'js/jquery.js',
	helpers\url::admin_template_path().'js/bootstrap.min.js')
); ?>
<?php echo $data['js']; ?>

</body>
</html>