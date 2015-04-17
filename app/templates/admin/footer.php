<!-- End div container-fluid -->
</div>
<!-- End page-wrapper -->
</div>
<!-- End Page Wrapper -->
</div>
<?php 
\helpers\assets::js(array(
	helpers\url::admin_template_path().'jquery.js'),
	helpers\url::admin_template_path().'bootstrap.min.js')
); ?>
<?php echo $data['js']; ?>

</body>
</html>