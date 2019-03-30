<div class="col-sm-12">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#formGrid" data-toggle="tab">Forms</a></li>
		<li><a href="#userGrid" data-toggle="tab">Users</a></li>
	</ul>
</div>
<div class="col-sm-12">&nbsp;</div>
<div class="col-sm-12">
	<a class="add-btn btn btn-default ">ADD NEW FORM TO PROJECT <span class="glyphicon glyphicon-chevron-down" style="font-size: 12px;"></span></a>
	<div class="header-icon-div pull-right">
		<div class="header-icons">
			<span class="glyphicon glyphicon-search"></span>
			<input type="text" class="form-control" id="search" placeholder="Search Forms Here...">
		</div>
	</div>
</div>
<div class="col-sm-12">&nbsp;</div>
<div class="col-sm-12">
	<div class="grid-filters">
		<div>
			<div class="header-icon-div header-icons">
				<input  type="checkbox">&nbsp;&nbsp; Select All
			</div>
		</div>
		<div>
			<div class="header-icon-div header-icons">
				<span class="glyphicon glyphicon-repeat"></span>
				<span>&nbsp;Refresh</span>
			</div>
		</div>
		<div>
			<div class="header-icon-div header-icons">
				<span class="glyphicon glyphicon-filter"></span>
				<span>&nbsp;Filter&nbsp;</span>
				<span class="glyphicon glyphicon-chevron-down"></span>
			</div>
		</div>
		<div class="pull-right">
			<div class="header-icon-div header-icons">
				<a>View All</a>
			</div>
		</div>
	</div>
	<div class="col-sm-12">&nbsp;</div>
	<div class="tab-content">
		<div class="tab-pane grid-data active" id="formGrid">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>Forms</th>
						<th>Shapes</th>
						<th>Reminders</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($forms) > 0){
								foreach ($forms as $key => $item): ?>
								<tr>
									<td><input type="checkbox"></td>
									<td><?=$item['name']?></td>
									<td><?=$item['shape']?></td>
									<td><?=$item['reminder']?></td>
								</tr>
							<?php endforeach;
						 }else{ ?>
								<tr>
									<td colspan="4">No records found</td>
								<tr>
						<?php }
					?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane grid-data" id="userGrid">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>First name</th>
						<th>Surname</th>
						<th>Age</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($profile) > 0){
								foreach ($profile as $key => $item): ?>
								<tr>
									<td><input type="checkbox"></td>
									<td><?=$item['first_name']?></td>
									<td><?=$item['last_name']?></td>
									<td><?=$item['age']?></td>
								</tr>
							<?php endforeach;
						 }else{ ?>
								<tr>
									<td colspan="4">No records found</td>
								<tr>
						<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
