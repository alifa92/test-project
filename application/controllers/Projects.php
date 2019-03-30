<?php
class Projects extends CI_Controller {

	public function index()
	{
		$data['project_list'] = $this->get_project_list();

		$this->load->view('templates/header');
		$this->load->view('project_layout', $data);
		$this->load->view('templates/footer');
	}

	public function get_project_list($params = '')
	{
		$this->load->helper('common_functions');

		$search_text 	= ($this->input->post('search_text'))?$this->input->post('search_text'):'';
		$request 			= ($this->input->post('request'))?$this->input->post('request'):0;

		//Get project data
		$get_data = callAPI('GET', base_url('api/get_project_data').'?apiKey='.$this->config->item('api_key').'&search_text='.$search_text, false);

		$projectArr = array();
		if($get_data['status_code'] == '200'){
			$projectArr = $get_data['data'];
		}

		$data['projects'] = $projectArr;

		if($request == 1)
			echo json_encode($this->load->view('project_list', $data, true));
		else
			return $this->load->view('project_list', $data, true);
	}

	public function get_project_data($project_id = 0)
	{
		$project_id = ($this->input->post('project_id'))?$this->input->post('project_id'):$project_id;

		if($project_id > 0)
		{
			$this->load->helper('common_functions');

			//Get form data
			$get_data = callAPI('GET', base_url('api/get_project_data').'?apiKey='.$this->config->item('api_key').'&project_id='.$this->input->post('project_id'), false);

			$projectArr = array();
			if($get_data['status_code'] == '200'){
				$projectArr = $get_data['data'];
			}

			$data['project_data'] = $projectArr[0];

			$return_arr['project_desc'] = $this->load->view('project_desc', $data, true);

			unset($data);

			//Get form data
			$get_data = callAPI('GET', base_url('api/get_project_form_data').'?apiKey='.$this->config->item('api_key').'&project_id='.$this->input->post('project_id'), false);

			$formArr = array();
			if($get_data['status_code'] == '200'){
				$formArr = $get_data['data'];
			}

			$data['forms'] = $formArr;

			//Get profile data
			$get_data = callAPI('GET', base_url('api/get_project_profile_data').'?apiKey='.$this->config->item('api_key').'&project_id='.$this->input->post('project_id'), false);

			$profileArr = array();
			if($get_data['status_code'] == '200'){
				$profileArr = $get_data['data'];
			}

			$data['profile'] = $profileArr;

			$return_arr['project_forms'] = $this->load->view('project_forms', $data, true);

			echo json_encode($return_arr);
		}
	}

	public function edit($params = '')
	{
		$action = ($this->input->post('action'))?$this->input->post('action'):'list';
		$this->load->helper('common_functions');

		$error_msg = '';
		if($action == 'update'){
			$dataArr['apiKey'] 	= $this->config->item('api_key');
			$form_data = $this->input->post();

			if($form_data['name'] != ''){
				unset($form_data['action']);
				$dataArr['data']		= json_encode(array($form_data));

				$get_data = callAPI('POST', base_url('api/create_projects'), $dataArr);

				if($get_data['status_code'] == '200'){
					redirect('projects', 'refresh');
				}else{
					$error_msg = $get_data['message'];
				}
			}else{
				$error_msg = 'Name field is mandatory.';
			}
		}

		//Get form data
		$get_data = callAPI('GET', base_url('api/get_forms').'?apiKey='.$this->config->item('api_key'), false);

		$formArr = array();
		if($get_data['status_code'] == '200'){
			$formArr = $get_data['data'];
		}

		$data['form_arr'] = $formArr;

		//Get profile data
		$get_data = callAPI('GET', base_url('api/get_profiles').'?apiKey='.$this->config->item('api_key'), false);

		$profileArr = array();
		if($get_data['status_code'] == '200'){
			$profileArr = $get_data['data'];
		}

		$data['error_msg'] = $error_msg;
		$data['profile_arr'] = $profileArr;

		$this->load->view('templates/header');
		$this->load->view('project_edit', $data);
		$this->load->view('templates/footer');
	}
}
