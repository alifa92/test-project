<?php foreach ($projects as $key => $item): ?>
	<li data-project-id="<?=$item['id']?>">
		<div class="col-sm-12">
			<div class="proj-list-header">
				<span><?=$item['project']?></span>
				<div class="three-sel-dots"></div>
			</div>
			<div class="proj-list-body">
				<div class="col-sm-12 no-gutters">
					<div class="proj-cnt-block"><?=sprintf('%02d', $item['formsubmitted'])?></div>
					<div class="proj-cnt-title">Number of Forms</div>
				</div>
				<div class="col-sm-12 no-gutters">
					<div class="proj-cnt-block"><?=sprintf('%02d', $item['total'])?></div>
					<div class="proj-cnt-users">
						<span><img src="<?php echo base_url('images/profile-2.png'); ?>"></span>
						<span><img src="<?php echo base_url('images/profile-3.png'); ?>"></span>
						<span><img src="<?php echo base_url('images/profile-4.png'); ?>"></span>
						<span class="badge badge-pill badge-primary">+4</span>
					</div>
				</div>
			</div>
		</div>
	</li>
<?php endforeach; ?>
