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
    $data = $this->work_order_model->get_wo($record);
    $this->load->view('dashboard/admin/view_wo', $data);

    /*{  // To be removed - have to figure out how this should work
      $user = $this->session->userdata('username');
      $this->work_order_model->set_work_order($user);
      $this->load->view('pages/success');
    }*/
  }
}