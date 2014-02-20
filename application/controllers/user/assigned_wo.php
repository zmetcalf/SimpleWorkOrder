<?php

class Assigned_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('users_model', 'work_order_model'));
  }

  public function assigned_wo()
  {
    $data['page_title'] = "Your Assigned Work Orders";
    $data['result'] = $this->work_order_model->get_wo_assigned(
                      $this->users_model->get_UID(
                      $this->session->userdata('username')));
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }
}
