jQuery(document).ready(function() {
	initProjectLoad();
});

function initProjectLoad(){
	jQuery(document).on('click', '.proj-list ul > li', function(){
		jQuery('li .proj-list-body').removeClass('active');
		jQuery('.proj-list-body', this).addClass('active');

		var project_id = jQuery(this).attr('data-project-id');

		jQuery.post("projects/get_project_data", {
			'project_id' : project_id
		},function(data, status){
			var data_obj = jQuery.parseJSON(data)
			if(status == 'success'){
				jQuery('.proj-det-block').html(data_obj['project_desc']);
				jQuery('.proj-form-user-list').html(data_obj['project_forms']);
			}
		});
	});

	jQuery(document).on('click', '.proj-form-user-list ul.nav-tabs > li', function(){
		jQuery('.proj-form-user-list ul.nav-tabs > li').removeClass('active');
		jQuery(this).addClass('active');
	});


	jQuery(document).on('keyup', '#search', function(){
		jQuery.post("projects/get_project_list", {
			'search_text' : jQuery(this).val(),
			'request' : 1
		},function(data, status){
			if(status == 'success'){
				jQuery('.proj-list > ul').html(jQuery.parseJSON(data));
				jQuery('.proj-det-block, .proj-form-user-list').html('');
				jQuery(".proj-list ul > li:first-child").trigger('click');
			}
		});
	});

	jQuery(".proj-list ul > li:first-child").trigger('click');
}
