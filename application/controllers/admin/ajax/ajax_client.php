<?php

class Ajax_client extends CI_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function search_client($first_name='', $last_name='') {
    $this->load->model('client_model');
    $result = $this->client_model->get_search_by_name($first_name, $last_name);
      $this->output->set_content_type('application/json')
        ->set_output(json_encode($result));
  }

  public function get_client($UID) {
    $this->load->model('client_model');
    $data['result'] = $this->client_model->get_client($UID);
    if(!$data['result']) {
      echo "<div class='alert alert-danger'>Application Error</div>";
    }
    else {
      $this->load->view('dashboard/admin/subforms/client_info', $data);
    }
  }
}