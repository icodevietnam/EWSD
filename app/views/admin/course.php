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
<div class="row crud-action">
	<div class="col-lg-3">
		<button class="btn btn-primary btn-create" data-toggle="modal" data-target="#crudCreate">Create</button>
	</div>
</div>
<div id="mainTable" class="row">
	<table class="table table-striped table-hover" id="tblList"></table>
</div>
<div id="crudCreate" class="modal fade" id="popup-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="save-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Create or Update</h4>
				</div>
				<div class="modal-body">
					<span id="modelId" class="hide">0</span>
					<div class="form-group">
						<label for="txtName">Name: </label>
						<input id="name" name="name" class="form-control" type="text" placeholder="Name" required />
					</div>
					<div class="form-group">
						<label for="txtContent">Content: </label>
						<textarea id="content" name="content" class="form-control" placeholder="Content" required ></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="javascript:actionEditCreate()" class="btn btn-primary">Save changes</button>
					<button type="button" onclick="javascript:resetValue()" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
\helpers\assets::js(array(
						helpers\url::admin_template_path() . 'js/courseAdmin.js')
); ?>