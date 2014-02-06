<?php

class Pages extends CI_Controller {

  public function view()
  {
    $data['stylesheet'] = 'cover';
    $data['additional_header_el'] = '';
    $data['title'] = 'Welcome to SimpleWorkOrder';
    $data['description'] = 'Welcome to SimpleWorkOrder';
    $data['author'] = 'SimpleWorkOrder';

    $this->load->view('templates/header', $data);
    $this->load->view('pages/home');
    $this->load->view('templates/footer');
  }
}