<?php

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->data['additional_css_el'] = '';
    $this->data['additional_js_el'] = '';
    $this->data['stylesheet'] = 'dashboard';
    $this->data['description'] = 'Login to SimpleWorkOrder';
    $this->data['author'] = 'SimpleWorkOrder';
    $this->data['title'] = 'Dashboard | SimpleWorkOrder';
    $this->data['menu_title'] = 'SimpleWorkOrder';
  }

  public function index($page = 'map')
  {
    if($this->session->userdata('logged_in') == FALSE) {
      $this->load->helper('url');
      redirect('/login');
    }
    $this->generate_data($page);
    $this->load_page($page);
  }

  public function generate_data($page)
  {
    if($page == 'create-user') {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/admin/create-user.css" />'
      );
      $this->data['additional_js_el'] = array(
        '<script src="' . base_url() . 'static/js/admin/create-user.js"></script>'
      );
    }
    else {
      $this->data['additional_css_el'] = array(
        '<link rel="stylesheet" href="' . base_url() . 'static/css/lib/leaflet.css" />',
        '<link rel="stylesheet" href="' . base_url() . 'static/css/map.css" />'
      );
      $this->data['additional_js_el'] = array(
        '<script src="' . base_url() . 'static/js/lib/leaflet.js"></script>',
        '<script src="' . base_url() . 'static/js/map.js"></script>'
      );
    }
  }

  public function load_page($page)
  {
    $this->load->view('templates/header', $this->data);
    $this->load->view('dashboard/main-nav', $this->data);
    $this->load->view('dashboard/sidebar');
    if($page =='create-user') {
      $this->load->library('../controllers/admin/create_user');
      $this->create_user->create_user();
    }
    else {
      $this->load->view('dashboard/map');
    }
    $this->load->view('dashboard/footer');
    $this->load->view('templates/footer', $this->data);
  }
}