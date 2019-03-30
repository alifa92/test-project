<?php
require_once 'RequestAPI.class.php';
require_once 'Project.class.php';

class MyAPI extends RequestAPI
{
	public $ci;

    public function __construct($request, $origin) {
        parent::__construct($request);

		$this->ci = & get_instance();

      if (!array_key_exists('apiKey', $this->request)) {
          throw new Exception('No API Key provided');
      } else if (!$this->verifyKey($this->request['apiKey'])) {
          throw new Exception('Invalid API Key');
      }
    }

	protected function verifyKey($apiKey){
		if($apiKey == $this->ci->config->item('api_key')){
			return true;
		}

		return false;
	}

  protected function get_project_data() {
		$projectObj = new Project();
    if ($this->method == 'GET') {
       return $projectObj->get_project_data($this->request);
    } else {
        return "Only accepts GET requests";
    }
  }

  protected function create_projects() {
			$projectObj = new Project();
      if ($this->method == 'POST') {
         return $projectObj->create_projects($this->request);
      } else {
          return "Only accepts POST requests";
      }
  }

  protected function get_project_form_data() {
			$projectObj = new Project();
      if ($this->method == 'GET') {
         return $projectObj->get_project_form_data($this->request);
      } else {
          return "Only accepts GET requests";
      }
  }

  protected function create_forms() {
			$projectObj = new Project();
      if ($this->method == 'POST') {
         return $projectObj->create_forms($this->request);
      } else {
          return "Only accepts POST requests";
      }
  }

  protected function get_project_profile_data() {
			$projectObj = new Project();
      if ($this->method == 'GET') {
         return $projectObj->get_project_profile_data($this->request);
      } else {
          return "Only accepts GET requests";
      }
  }

  protected function create_profiles() {
			$projectObj = new Project();
      if ($this->method == 'POST') {
         return $projectObj->create_profiles($this->request);
      } else {
          return "Only accepts POST requests";
      }
  }

	protected function get_forms() {
			$projectObj = new Project();
      if ($this->method == 'GET') {
         return $projectObj->get_forms();
      } else {
          return "Only accepts GET requests";
      }
  }

	protected function get_profiles() {
			$projectObj = new Project();
      if ($this->method == 'GET') {
         return $projectObj->get_profiles();
      } else {
          return "Only accepts GET requests";
      }
  }
 }
?>
