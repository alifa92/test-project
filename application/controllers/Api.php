<?php
require APPPATH.'/libraries/MyAPI.class.php';

class Api extends CI_Controller {

      public function index($params = '')
      {
        try {
          $API = new MyAPI($params, $this->input->server('HTTP_ORIGIN'));
          echo $API->processAPI();
        } catch (Exception $e) {
          echo json_encode(Array('error' => $e->getMessage()));
        }
      }
}
