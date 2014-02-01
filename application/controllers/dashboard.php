<?php

class Dashboard extends CI_Controller {

  public function view()
  {
    $data['stylesheet'] = 'dashboard';
    $this->load->view('templates/header', $data);
    $this->load->view('pages/dashboard');
    $this->load->view('templates/footer');
  }
}