<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $data['title'] ?></h1>
	</div>
	<ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i><a href="admin/dashboard">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-bar-chart-o"></i><a href="/admin/role"><?php echo ucwords($data['key']) ?></a>
        </li>
    </ol>
</div>
<div class="row crud-action">
	<div class="col-lg-3"><button onclick="javascript:viewEditCreate(0)" class="btn btn-primary" data-toggle="modal" data-target="#crudCreate" >Create</button></div>
</div>
<div id="mainTable" class="row">
	<table class="table table-striped table-hover"  id="tblList"> </table>
</div>

<div id="crudCreate" class="modal fade">
	<form>
	<div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Create / Edit</h4>
	      </div>
	      <div class="modal-body">
	      	<span id='modelId' class='hide'>0</span>
	        <div class="form-group">
    			<label for="name">Name</label>
    			<input type="text" name='name' class="form-control" placeholder="Name" required>
  			</div>
  			<div class="form-group">
    			<label for="name">Description</label>
    			<input type="text" name='description' class="form-control" required placeholder="Description">
  			</div>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" id="btnSave" onclick="actionEditCreate()" class="btn btn-primary">Save Changes</button>
	        <button type="button" id="btbn" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</form>
</div><!-- /.modal -->

<?php 
\helpers\assets::js(array(
	helpers\url::admin_template_path().'js/roleAdmin.js')
); ?>