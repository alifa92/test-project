<div class="proj-header-block col-sm-12">
	<div class="row col-sm-12">
		<div class="proj-header-title col-sm-4">
			<div>
				<h4><strong>PROJECTS</strong></h4><span> (1017)</span>
			</div>
		</div>
		<div class="pull-right">
			<div class="header-icon-div header-icons">
				<a class="add-btn btn btn-default" href="<?php echo base_url('projects/edit'); ?>">CREATE NEW PROJECT</a>
			</div>
		</div>
		<div class="header-icon-div pull-right">
			<div class="header-icons">
				<span class="glyphicon glyphicon-search"></span>
				<input type="text" class="form-control" id="search" placeholder="Search Project Here...">
			</div>
		</div>
		<div class="pull-right">
			<div class="header-icon-div header-icons">
				<span class="glyphicon glyphicon-filter"></span>
				<span>&nbsp;Filter&nbsp;</span>
				<span class="glyphicon glyphicon-chevron-down"></span>
			</div>
		</div>
		<div class="pull-right">
			<div class="header-icon-div header-icons">
				<span class="glyphicon glyphicon-repeat"></span>
				<span>&nbsp;Refresh</span>
			</div>
		</div>
	</div>
</div>
<div class="proj-body-block col-sm-12">
	<div class="proj-list col-sm-12">
		<ul>
		<?=$project_list?>
		</ul>
		<div class="col-sm-12">
			<a>View All Projects</a>
		</div>
	</div>
	<div class="proj-det-block col-sm-12"></div>
	<div class="proj-form-user-list col-sm-9">
	</div>	
</div>