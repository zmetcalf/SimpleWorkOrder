<?php

class Dashboard extends CI_Controller {

  public function view()
  {
    $data['stylesheet'] = 'dashboard';
    $data['description'] = 'Login to SimpleWorkOrder';
    $data['author'] = 'SimpleWorkOrder';
    $data['title'] = 'Dashboard | SimpleWorkOrder';

    $this->load->view('templates/header', $data);
    $this->load->view('pages/dashboard');
    $this->load->view('templates/footer');
  }
}