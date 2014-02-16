<?php

class View_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('work_order_model');
  }

  public function view_wo($record)
  {
    $this->load->helper('form');
    $user = $this->session->userdata('username');

    if($this->input->post('assign') == 'Sign Me Up!') {
      $this->work_order_model->set_assigned_to($record, $user);
      $this->load->view('pages/success');
    }
    else if($this->input->post('unassign')) {
      $this->work_order_model->unset_assigned_to($record);
      $this->load->view('pages/success');
    }
    else { // TODO add error handling if wo not found
      $data['result'] = $this->work_order_model->get_wo($record);
      $data['record'] = $record;
      $this->load->view('dashboard/admin/view_wo', $data);
    }
  }
}
