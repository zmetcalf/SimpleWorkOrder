<?php

class Ajax_wo extends CI_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function get_open_wo() {
    $this->load->model('work_order_model');
    $result = $this->work_order_model->get_open_wo();
    if(!$result) {
      echo "<div class='alert alert-danger'>Application Error</div>";
    }
    else {
      $this->output->set_content_type('application/json')
        ->set_output(json_encode($result));
    }
  }

  public function search_wos($job_type = '') {
    $this->load->model('work_order_model');
    $result = $this->work_order_model->search_wos($job_type);
    $this->output->set_content_type('application/json')
      ->set_output(json_encode($result));
  }
}