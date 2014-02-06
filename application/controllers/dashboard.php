<?php

class Dashboard extends CI_Controller {

  public function view()
  {
    if($this->session->userdata('logged_in') == FALSE) {
      $this->load->helper('url');
      redirect('/login');
    }
    $data['stylesheet'] = 'dashboard';
    $data['additional_header_el'] = array(
      '<link rel="stylesheet" href="' . base_url() . 'static/css/lib/leaflet.css" />',
      '<script src="' . base_url() . 'static/js/lib/leaflet.js"></script>'
    );
    $data['description'] = 'Login to SimpleWorkOrder';
    $data['author'] = 'SimpleWorkOrder';
    $data['title'] = 'Dashboard | SimpleWorkOrder';

    $this->load->view('templates/header', $data);
    $this->load->view('pages/dashboard');
    $this->load->view('templates/footer');
  }
}