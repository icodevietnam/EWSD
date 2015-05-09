<span class="hide" id="currentRole"><?php $currentUser = helpers\session::get('user');
echo $currentUser->role_name ?></span>
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
		<button onclick="javascript:showDivPassword()" class="btn btn-primary btn-create" data-toggle="modal" data-target="#crudCreate">Create</button>
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
					<span id="roleId" class="hide">0</span>
					<div class="form-group">
						<label for="txtName">Name: </label>
						<input id="name" name="name" class="form-control" type="text" placeholder="Enter name" required />
					</div>
					<div id="birthday"  class="bfh-datepicker" data-format="y-m-d" data-date="today">
					</div>
					<div class="form-group">
						<label for="txtAddress">Address: </label>
						<input id="address" name="address" class="form-control" type="text" placeholder="Enter address" required />
					</div>
					<div class="form-group">
						<label for="txtEmail">Email: </label>
						<input id="email" type="email" name="email" class="form-control" type="email" placeholder="Enter email" required />
					</div>
					<div class="form-group ipUsername">
						<label for="txtUsername">Username: </label>
						<input id="username" name="username" class="form-control" type="text" placeholder="Enter username" required />
					</div>
					<div class="form-group ipPassword">
						<label for="txtPassword">Password: </label>
						<input id="password" name="password" class="form-control" type="password" placeholder="Enter password" required />
					</div>
					<div class="form-group ipConfirmpassword">
						<label for="confirmpassword">Confirm password: </label>
						<input id="confirmpassword" name="confirmpassword" class="form-control" type="password" placeholder="Enter confirm password" required />
					</div>
					<div class="form-group">
						<label for="sex">Gender: </label>
						<input type="radio" name="gender" checked value="1"> Male
						<input type="radio" name="gender" value="0"> Female
					</div>
					<div class="form-group">
						<label for="role">Role: </label>
						<?php
							$listRole = $data['listRole'];
							foreach($listRole as &$role){
								echo "<input type='radio' name='role' value='".$role->id."'>"."<span style='margin-right:10px'>".$role->name."</span>";
							}
						?>
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
						helpers\url::admin_template_path() . 'js/userAdmin.js')
); ?>