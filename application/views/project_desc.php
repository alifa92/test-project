<div class="col-sm-12">
	<span id="projTitle"><?=$project_data['project']?></span>
	<a class="glyphicon glyphicon-pencil"></a>
	<a class="add-btn btn btn-default pull-right">+ ADD TO GROUP</a>
</div>
<div class="col-sm-12">
	<div class="last-updated-div">
		Last Updated: <span id="lastUpdatedOn"><?=date('d M', strtotime($project_data['updated_on']))?></span>
	</div>
	<div class="created-on-div">
		Created On: <span id="createdOn"><?=date('F d, Y', strtotime($project_data['created_on']))?></span>
	</div>
	<div class="project-desc">
		<?=nl2br($project_data['description'])?>
	</div>
	<div style="margin: 5px 0; font-size: 12px;">
		<a>View More...</a>
	</div>
</div>
<div class="col-sm-12">
	<hr style="margin-top: 10px; border-top-width: 5px;">
</div>
