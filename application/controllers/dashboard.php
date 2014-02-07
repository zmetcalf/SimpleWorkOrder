<?php

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');

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

  public function create_user()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('dashboard/create_user');
    }
    else
    {
      $this->users_model->set_user();
      $this->load->view('pages/success');
    }
  }

  public function add_map_data()
  {
    $this->data['additional_css_el'] = array(
      '<link rel="stylesheet" href="' . base_url() . 'static/css/lib/leaflet.css" />',
      '<link rel="stylesheet" href="' . base_url() . 'static/css/map.css" />',
    );
    $this->data['additional_js_el'] = array(
      '<script src="' . base_url() . 'static/js/lib/leaflet.js"></script>',
      '<script src="' . base_url() . 'static/js/map.js"></script>'
    );
  }

  public function generate_data($page)
  {
    if($page =='create-user') {

    }
    else {
      $this->add_map_data();
    }
  }

  public function load_page($page)
  {
    $this->load->view('templates/header', $this->data);
    $this->load->view('dashboard/main-nav', $this->data);
    $this->load->view('dashboard/sidebar');
    if($page =='create-user') {
      $this->create_user();
    }
    else {
      $this->load->view('dashboard/map');
    }
    $this->load->view('dashboard/footer');
    $this->load->view('templates/footer', $this->data);
  }
}