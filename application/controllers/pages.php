<?php

class Pages extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->data['stylesheet'] = 'cover';
    $this->data['additional_css_el'] = '';
    $this->data['additional_js_el'] = '';
    $this->data['title'] = 'Home';
    $this->data['description'] = 'Welcome to SimpleWorkOrder';
    $this->data['author'] = 'SimpleWorkOrder';
  }
  public function view($pages = 'home')
  {
    $this->data['title'] = ucfirst($pages) . ' | SimpleWorkOrder';
    $this->data['lead'] = 'Volunteering is a great experience!';
    $pages = 'home'; // Remove later when other pages are added

    $this->load->view('templates/header', $this->data);
    $this->load->view('pages/templates/home_header', $this->data);
    $this->load->view('pages/' . $pages, $this->data);
    $this->load->view('pages/templates/home_footer');
    $this->load->view('templates/footer', $this->data);
  }
}