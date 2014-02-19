<?php

class Create_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('work_order_model');
  }

  public function create_wo()
  {
    if(!($this->session->userdata('user_type') == 'Administrator')) {
      $this->load->helper('url');
      redirect('/dashboard');
    }
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('uid', 'Client', 'required|xss_clean');
    $this->form_validation->set_rules('job-type', 'Job Type', 'trim|required|xss_clean');

    $this->form_validation->set_rules('additional-info', 'Additional Info', 'xss_clean');

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('dashboard/admin/create_wo');
    }
    else
    {
      $user = $this->session->userdata('username');
      $this->work_order_model->set_work_order($user);
      $this->load->view('pages/success');
    }
  }
}