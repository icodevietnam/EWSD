<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $data['title'] ?></h1>
	</div>
	<ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i><a href="admin/dashboard">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-bar-chart-o"></i><a href="/admin/role"><?php ucwords($data['key']) ?></a>
        </li>
    </ol>
</div>
<div class="row crud-action">
	<div class="col-lg-3"><button class="btn btn-primary">Create</button></div>
</div>
<div id="mainTable" class="row">
	<table class="table table-striped table-hover"  id="tblList"> </table>
</div>
