<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $data['title'] ?></h1>
	</div>
	<ol class="breadcrumb">
		<li>
			<i class="fa fa-dashboard"></i><a href="admin/dashboard">Dashboard</a>
		</li>
		<li class="active">
			<i class="fa fa-bar-chart-o"></i><a href="/admin/<?php echo $data['key'] ?>"><?php echo $data['key'] ?></a>
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
					<button type="button" onclick="javascript:resetValue()" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Create or Update</h4>
				</div>
				<div class="modal-body">
					<span id="modelId" class="hide">0</span>
					<div class="form-group">
						<label for="name">Name: </label>
						<input id="name" name="name" class="form-control" type="text" placeholder="Name" required />
					</div>
					<div class="form-group">
						<label for="description">Description: </label>
						<input id="description" name="description" class="form-control" type="text" placeholder="Description" required />
					</div>
					<div class="form-group">
						<label for="type">Type: </label>
						<input id="type" name="type" class="form-control" type="text" placeholder="Type" required />
					</div>
					<div class="form-group">
						<label for="status">Status: </label>
						<input id="status1" name="status" class="" type="radio" value="0" checked /> Enable
						<input id="status2" name="status" class="" type="radio" value="1" /> Disable
					</div>
					<div class="form-group">
						<label for="uploadFile">Upload: </label>
						<input id="uploadFile" name="uploadFile" class="" type="file" />
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
						helpers\url::admin_template_path() . 'js/interactionAdmin.js')
); ?>