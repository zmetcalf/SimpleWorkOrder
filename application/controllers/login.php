<?php

class Login extends CI_Controller {

  public function view()
  {
    $data['stylesheet'] = 'signin';
    $this->load->view('templates/header', $data);
    $this->load->view('pages/login');
    $this->load->view('templates/footer');
  }
}
