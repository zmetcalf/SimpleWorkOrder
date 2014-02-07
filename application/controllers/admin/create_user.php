<?php

class Create_user extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function create_user()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('user-type', 'User Type', 'trim|required|min_length[5]|max_length[20]|is_unique[users.user_name]|xss_clean');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]|valid_email');

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('dashboard/admin/create_user');
    }
    else
    {
      $this->users_model->set_user();
      $this->load->view('pages/success');
    }
  }
}