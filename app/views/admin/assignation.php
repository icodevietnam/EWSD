<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $data['title'] ?></h1>
	</div>
	<ol class="breadcrumb">
		<li>
			<i class="fa fa-dashboard"></i><a href="/EWSD/admin/dashboard">Dashboard</a>
		</li>
		<li class="active">
			<i class="fa fa-bar-chart-o"></i><a href="/EWSD/admin/<?php echo $data['key'] ?>"><?php echo $data['key'] ?></a>
		</li>
	</ol>
</div>

<div class="row">
	<div class="col-lg-3">
		<span class="title">Choose Project:<span>
		<select id="selectProject" style="width:50%">
		</select>
	</div>
	<div class="col-lg-3">
		<span class="title">Choose Student:<span>
		<select id="selectStudent" style="width:50%;height:400px" multiple>
		  
		</select>
	</div>
	<div class="col-lg-3">
		<span class="title">Choose Supervisor:<span>
		<select id="selectProject" style="width:50%">
		  
		</select>
	</div>
	<div class="col-lg-3">
		<span class="title">Choose Second Marker:<span>
		<select id="selectProject" style="width:50%">
		  
		</select>
	</div>
</div>

<?php
\helpers\assets::js(array(
						helpers\url::admin_template_path() . 'js/assignationAdmin.js')
); ?>