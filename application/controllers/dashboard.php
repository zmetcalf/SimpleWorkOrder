<?php

class Dashboard extends CI_Controller {

  public function view()
  {
    if($this->session->userdata('logged_in') == FALSE) {
      $this->load->helper('url');
      redirect('/login');
    }
    $data['stylesheet'] = 'dashboard';
    $data['additional_css_el'] = array(
      '<link rel="stylesheet" href="' . base_url() . 'static/css/lib/leaflet.css" />',
      '<link rel="stylesheet" href="' . base_url() . 'static/css/map.css" />',
    );
    $data['additional_js_el'] = array(
      '<script src="' . base_url() . 'static/js/lib/leaflet.js"></script>',
      '<script src="' . base_url() . 'static/js/map.js"></script>'
    );
    $data['description'] = 'Login to SimpleWorkOrder';
    $data['author'] = 'SimpleWorkOrder';
    $data['title'] = 'Dashboard | SimpleWorkOrder';

    $this->load->view('templates/header', $data);
    $this->load->view('dashboard/main-nav');
    $this->load->view('dashboard/sidebar');
    $this->load->view('dashboard/map');
    $this->load->view('dashboard/footer');
    $this->load->view('templates/footer', $data);
  }
}