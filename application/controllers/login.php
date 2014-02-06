<?php

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index()
  {
    if($this->session->userdata('logged_in') == TRUE) {
      $this->load->helper('url');
      redirect('/dashboard');
    }

    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username',
      'trim|required|callback_username_and_password_check|xss_clean');

    $data['description'] = 'Login to SimpleWorkOrder';
    $data['author'] = 'SimpleWorkOrder';
    $data['title'] = 'Login | SimpleWorkOrder';
    $data['stylesheet'] = 'signin';
    $data['additional_css_el'] = '';
    $data['additional_js_el'] = '';
    $data['attributes'] = array('class' => 'form-signin', 'role' => 'form');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('pages/login', $data);
      $this->load->view('templates/footer', $data);
    }
    else {
      $session_data = array(
        'username' => $this->input->post('username'),
        'logged_in' => TRUE
      );

      $this->session->set_userdata($session_data);
      $this->load->helper('url');
      redirect('/dashboard');
    }
  }

  public function username_and_password_check()
  {
    if($this->users_model->get_username_and_password()) {
      return TRUE;
    }
    else {
      $this->form_validation->set_message('username_and_password_check',
                                          'Invalid username or password');
      return FALSE;
    }
  }
}
