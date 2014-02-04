<?php
// This will be expanded later - used for testing now

class Create_user extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function view()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('pages/create_user');
    }
    else
    {
      $this->users_model->set_user();
      $this->load->view('pages/success');
    }

  }

}
