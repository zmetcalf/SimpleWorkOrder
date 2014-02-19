<?php

class Assigned_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('users_model', 'work_order_model'));
  }

  public function assigned_wo()
  {
    $data['result'] = $this->work_order_model->get_wo_assigned(
                      $this->users_model->get_UID(
                      $this->session->userdata('username')));
      $this->load->view('dashboard/user/assigned_wo', $data);
  }
}
