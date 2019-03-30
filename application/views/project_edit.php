<link href="<?php echo base_url('css/select2.min.css'); ?>" rel="stylesheet" />
<script src="<?php echo base_url('js/select2.min.js'); ?>"></script>

<div class="proj-header-block col-sm-12">
	<div class="row col-sm-12">
		<div class="proj-header-title col-sm-4">
			<div>
				<h4><strong>CREATE PROJECT</strong></h4>
			</div>
		</div>
	</div>
</div>
<div class="proj-body-block col-sm-12">
  <?php if ($error_msg != ''): ?>
    <div class="col-sm-12">
      <div class="col-sm-6">
        <div class="alert alert-danger">
          <strong>Error!</strong> <?=$error_msg?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <form id="projectEditForm" method="post" action="">
    <div class="col-sm-12">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="name">Name*</label>
          <input type="text" class="form-control" name="name">
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label for="description">Description (2000 characters)</label>
          <textarea class="form-control" rows="5" name="description"></textarea>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label class="form-label" for="forms">Select Form (s)</label>
          <select class="form-control" name="forms[]" multiple="multiple">
            <?php foreach ($form_arr as $f_val): ?>
              <option value="<?=$f_val['id']?>"><?=$f_val['name']?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="reminder">&nbsp;</label>
          <select class="form-control" name="reminder">
            <option value="0">Set Reminder</option>
            <option value="1">Daily</option>
            <option value="2">Weekly</option>
          </select>
        </div>
      </div>
      <div class="col-sm-12 margin-10"></div>
      <div class="col-sm-4">
        <div class="form-group">
          <label class="form-label" for="profile">Select User (s)</label>
          <select class="form-control" name="profile[]" multiple="multiple">
            <?php foreach ($profile_arr as $f_val): ?>
              <option value="<?=$f_val['id']?>"><?=$f_val['name']?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-sm-12 margin-10"></div>
      <div class="col-sm-4">
        <div class="form-group">
          <label class="form-label" for="symbols">Symbol</label>
          <select class="form-control" name="symbols">
            <option value="0">Default</option>
            <option value="1">Symbol 1</option>
            <option value="2">Symbol 2</option>
          </select>
        </div>
      </div>
    </div>
    <input type="hidden" name="action" value="update">
    <div class="col-sm-12">
      <div class="col-sm-2">
        <a class="btn btn-default" href="<?php echo base_url('projects'); ?>">CANCEL</a>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn">CREATE PROJECT</button>
      </div>
    </div>
  </form>
</div>

<script>
jQuery(document).ready(function(){
  jQuery('[name="forms[]"]').select2({placeholder: "Choose one or multiple form(s)"});
  jQuery('[name="profile[]"]').select2({placeholder: "Choose one or multiple profile(s)"});
  jQuery('[name="reminder"], [name="symbols"]').select2();
});
</script>
