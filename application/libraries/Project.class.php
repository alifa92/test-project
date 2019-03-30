<?php


class Project
{
	public $_db_obj;
	public $ci;

    public function __construct() {
	   $this->ci = & get_instance();

	   $this->ci->load->database();
	   $this->_db_obj = $this->ci->db;
    }

	public function get_project_data($data = array()){
		$extra_where = (isset($data['project_id']) && !empty($data['project_id']))?' AND id = '.$this->_db_obj->escape($data['project_id']):'';
		$extra_where .= (isset($data['search_text']) && !empty($data['search_text']))?" AND name LIKE '%" .
    $this->_db_obj->escape_like_str($data['search_text'])."%' ":"";

		$sql = 'SELECT *
				FROM projects
				WHERE active = 1 '.$extra_where.'
				ORDER BY updated_on';

		$query = $this->_db_obj->query($sql);

		$json_arr = array();
		foreach ($query->result_array() as $row)
		{
					$json_arr[] = array('id' => $row['id'], 'project' => $row['name'], 'formsubmitted' => $row['formsubmitted'], 'total' => $row['total'], 'description' => $row['description'], 'created_on' => $row['created_on'], 'updated_on' => $row['updated_on']);
		}

		return array('status_code' => '200', 'status_message' => 'Success', 'data' => $json_arr);
	}

	public function create_projects($data = array()){
		$project_data = json_decode($data['data'], true);

		$success = 0;
		foreach($project_data as $key => $value)
		{
			unset($dataArr);
			$dataArr['name'] = $value['name'];
			$dataArr['formsubmitted'] = (isset($value['formsubmitted']))?$value['formsubmitted']:0;
			$dataArr['total'] = (isset($value['total']))?$value['total']:0;
			$dataArr['symbol'] = (isset($value['symbol']))?$value['symbol']:'';
			$dataArr['description'] = (isset($value['description']))?$value['description']:'';
			$dataArr['created_on'] = date('Y-m-d H:i:s');
			$dataArr['updated_on'] = date('Y-m-d H:i:s');

			$this->_db_obj->insert('projects', $dataArr);
			$rec_id = $this->_db_obj->insert_id();

			unset($profDataArr);
			foreach($value['profile'] as $p_value)
			{
				$profDataArr[] = array('project_id' => $rec_id, 'profile_id' => $p_value);
			}

			if(isset($profDataArr))
				$this->_db_obj->insert_batch('projects_profile', $profDataArr);


			unset($formDataArr);
			foreach($value['forms'] as $f_value)
			{
				$formDataArr[] = array('project_id' => $rec_id, 'form_id' => $f_value);
			}

			if(isset($formDataArr))
				$this->_db_obj->insert_batch('projects_forms', $formDataArr);

				$success = 1;
		}

		if($success == 1){
			return array('status_code' => '200', 'status_message' => 'Success', 'data' => 'Project/s created successfully');
		}else{
			return array('status_code' => '403', 'status_message' => 'Error', 'message' => 'Problem creating project/s.');
		}
	}

	public function get_project_form_data($data = array()){
		$sql = 'SELECT f.*
				FROM forms f
				INNER JOIN projects_forms pf ON (pf.form_id = f.id)
				WHERE f.active = 1 AND pf.project_id = '.$this->_db_obj->escape($data['project_id']).'
				GROUP BY f.id
				ORDER BY f.name';

		$query = $this->_db_obj->query($sql);

		$json_arr = array();
		foreach ($query->result_array() as $row)
		{
			$reminder = array_rand(array('Daily', 'Weekly', 'Not set'));
			$json_arr[] = array('id' => $row['id'], 'name' => $row['name'], 'shape' => $row['shape'], 'reminder' => 'Daily');
		}

		return array('status_code' => '200', 'status_message' => 'Success', 'data' => $json_arr);
	}

	public function create_forms($data = array()){
		$form_data = json_decode($data['data'], true);

		$success = 0;
		foreach($form_data as $key => $value)
		{
			$dataArr['name'] = $value['name'];
			$dataArr['shape'] = $value['shape'];
			$dataArr['created_on'] = date('Y-m-d H:i:s');
			$dataArr['updated_on'] = date('Y-m-d H:i:s');

			$this->_db_obj->insert('forms', $dataArr);

			$success = 1;
		}

		if($success == 1){
			return array('status_code' => '200', 'status_message' => 'Success', 'data' => 'Form/s created successfully');
		}else{
			return array('status_code' => '403', 'status_message' => 'Error', 'message' => 'Problem creating form/s.');
		}
	}

	public function get_project_profile_data($data = array()){
		$sql = 'SELECT p.*
				FROM profile p
				INNER JOIN projects_profile pp ON (pp.profile_id = p.id)
				WHERE p.active = 1 AND pp.project_id = '.$this->_db_obj->escape($data['project_id']).'
				GROUP BY p.id
				ORDER BY p.first_name';

		$query = $this->_db_obj->query($sql);

		$json_arr = array();
		foreach ($query->result_array() as $row)
		{
			$json_arr[] = array('first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'age' => $row['age']);
		}

		return array('status_code' => '200', 'status_message' => 'Success', 'data' => $json_arr);
	}

	public function create_profiles($data = array()){
		$profile_data = json_decode($data['data'], true);

		$success = 0;
		foreach($profile_data as $key => $value)
		{
			$dataArr['first_name'] 	= $value['first_name'];
			$dataArr['last_name'] 	= $value['last_name'];
			$dataArr['age'] 				= $value['age'];
			$dataArr['image_url'] 	= $value['image_url'];
			$dataArr['created_on'] 	= date('Y-m-d H:i:s');
			$dataArr['updated_on'] 	= date('Y-m-d H:i:s');

			$this->_db_obj->insert('profile', $dataArr);

			$success = 1;
		}

		if($success == 1){
			return array('status_code' => '200', 'status_message' => 'Success', 'data' => 'Profile/s created successfully');
		}else{
			return array('status_code' => '403', 'status_message' => 'Error', 'message' => 'Problem creating profile/s.');
		}
	}

	function get_forms(){
		$sql = 'SELECT f.*
				FROM forms f
				WHERE f.active = 1
				ORDER BY f.name';

		$query = $this->_db_obj->query($sql);

		$json_arr = array();
		foreach ($query->result_array() as $row)
		{
			$json_arr[] = array('id' => $row['id'], 'name' => $row['name']);
		}

		return array('status_code' => '200', 'status_message' => 'Success', 'data' => $json_arr);
	}

	function get_profiles(){
		$sql = "SELECT p.*, concat(p.first_name, ' ', p.last_name) as name
				FROM profile p
				WHERE p.active = 1
				ORDER BY name";

		$query = $this->_db_obj->query($sql);

		$json_arr = array();
		foreach ($query->result_array() as $row)
		{
			$json_arr[] = array('id' => $row['id'], 'name' => $row['name']);
		}

		return array('status_code' => '200', 'status_message' => 'Success', 'data' => $json_arr);
	}
}
?>
