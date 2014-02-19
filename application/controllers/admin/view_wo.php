<?php

class View_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('work_order_model');
  }

  public function view_wo($record)
  {
    $this->load->helper('form');
    $user_id = $this->users_model->get_UID(
      $this->session->userdata('username'));
    if($this->work_order_model->get_assigned_to($record) === $user_id) {
      $data['assigned_to_user'] = TRUE;
    }
    else {
      $data['assigned_to_user'] = FALSE;
    }
    if($this->input->post('assign')) {
      $this->work_order_model->set_assigned_to($record,
        $this->session->userdata('username'));
      $this->load->view('pages/success');
    }
    else if($this->input->post('unassign')) {
      $this->work_order_model->unset_assigned_to($record);
      $this->load->view('pages/success');
    }
    else if($this->input->post('completed')) {
      $this->work_order_model->set_completed($record,
        $this->session->userdata('username'));
      $this->load->view('pages/success');
    }
    else { // TODO add error handling if wo not found
      $data['result'] = $this->work_order_model->get_wo($record);
      $data['record'] = $record;
      $this->load->view('dashboard/admin/view_wo', $data);
    }
  }
}
