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
		<button class="btn btn-primary btn-create" data-toggle="modal" data-target="#popup-modal">Create</button>
	</div>
</div>
<div id="mainTable" class="row">
	<table class="table table-striped table-hover" id="tblList"></table>
</div>
<div class="modal fade" id="popup-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="save-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Create or Update</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="txtName">Name: </label>
						<input id="txtName" name="txtName" class="form-control" type="text" placeholder="Enter name" required />
					</div>
					<div class="form-group">
						<label for="txtBirthday">Birthday: </label>
						<input id="txtBirthday" name="txtBirthday" class="form-control" type="text" placeholder="Enter birthday" required />
					</div>
					<div class="form-group">
						<label for="txtAddress">Address: </label>
						<input id="txtAddress" name="txtAddress" class="form-control" type="text" placeholder="Enter address" required />
					</div>
					<div class="form-group">
						<label for="txtEmail">Email: </label>
						<input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Enter email" required />
					</div>
					<div class="form-group">
						<label for="txtUsername">Username: </label>
						<input id="txtUsername" name="txtUsername" class="form-control" type="text" placeholder="Enter username" required />
					</div>
					<div class="form-group">
						<label for="txtPassword">Password: </label>
						<input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Enter password" required />
					</div>
					<div class="form-group">
						<label for="txtConfirmPassword">Confirm password: </label>
						<input id="txtConfirmPassword" name="txtConfirmPassword" class="form-control" type="password" placeholder="Enter confirm password" required />
					</div>
					<div class="form-group">
						<label for="sex">Gender: </label>
						<input type="radio" name="sex" value="male"> Male
						<input type="radio" name="sex" value="female"> Female
					</div>
					<div class="form-group">
						<label for="role">Role: </label>
						<input type="radio" name="role" value="admin"> Admin
						<input type="radio" name="role" value="staff"> Staff  (Supervisor/Second marker)
						<input type="radio" name="role" value="student"> Student
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="delete-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="delete-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Confirm delete</h4>
				</div>
				<div class="modal-body">
					<p class="confirm-message">Are you sure you want to delete this user?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="button" class="btn btn-primary btn-yes" data-dismiss="modal">Yes</button>
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