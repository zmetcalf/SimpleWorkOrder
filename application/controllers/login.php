<?php

class Login extends CI_Controller {

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
}
