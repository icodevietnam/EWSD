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
		<span class="title">Choose Project:<span><br/>
		<select id="selectProject" style="width:50%">
		</select>
		<br/><br/>
		<button class="btn btn-sm btn-default" id="projNext">Next</button>
	</div>
	<div id="divStudent" class="col-lg-3">
		<span class="title">Choose Student:<span><br/>
		<select id="selectStudent" style="width:50%;height:400px" multiple>
		</select>
		<br/><br/>
		<button class="btn btn-sm btn-default" id="studPrev">Prev</button>
		<button class="btn btn-sm btn-default" id="studNext">Next</button>
	</div>
	<div id="divSupervisor" class="col-lg-3">
		<span class="title">Choose Supervisor:<span><br/>
		<select id="selectSupervisor" style="width:50%">
		</select>
		<br/><br/>
		<button class="btn btn-sm btn-default" id="supePrev">Prev</button>
		<button class="btn btn-sm btn-default" id="supeNext">Next</button>
	</div>
	<div id="divSecondMarker" class="col-lg-3">
		<span class="title">Choose Second Marker:<span><br/>
		<select id="selectSecondMarker" style="width:50%">
		</select>
		<br/><br/>
		<button class="btn btn-sm btn-default" id="secoPrev">Prev</button>
		<button class="btn btn-sm btn-primary" id="btnOk">Ok</button>
	</div>
</div>

<?php
\helpers\assets::js(array(
						helpers\url::admin_template_path() . 'js/assignationAdmin.js')
); ?>