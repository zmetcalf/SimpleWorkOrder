<?php

class Login extends CI_Controller {

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
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');

    $data['description'] = 'Login to SimpleWorkOrder';
    $data['author'] = 'SimpleWorkOrder';
    $data['title'] = 'Login | SimpleWorkOrder';
    $data['stylesheet'] = 'signin';
    $data['attributes'] = array('class' => 'form-signin', 'role' => 'form');

    $this->load->view('templates/header', $data);
    $this->load->view('pages/login', $data);
    $this->load->view('templates/footer');
  }

  public function username_check($str)
  {
    if($this->users_model->get_username($str)) {
      return TRUE;
    }
    else {
      $this->form_validation->set_message('username_check', 'Not a valid username');
      return FALSE;
    }
  }

  public function password_check($str)
  {
    if($this->users_model->get_password($str)) {
      return TRUE;
    }
    else {
      $this->form_validation->set_message('password_check', 'Incorrect password');
      return FALSE;
    }
  }
}
