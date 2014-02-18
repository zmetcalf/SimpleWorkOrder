<?php

class Create_client extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('client_model');
  }

  public function create_client()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('last-name', 'Last Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('first-name', 'First Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('street-address', 'Street Address', 'trim|required|xss_clean');
    $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
    $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
    $this->form_validation->set_rules('zip-code', 'Zip Code', 'trim|required|xss_clean');
    $this->form_validation->set_rules('primary-phone', 'Primary Phone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('secondary-phone', 'Secondary Phone', 'trim|required|xss_clean');

    $this->form_validation->set_rules('additional-info', 'Additional Info', 'xss_clean');
    $this->form_validation->set_rules('unit-number', 'Unit Number', 'trim|xss_clean');

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('dashboard/admin/create_client');
    }
    else
    {
      $this->client_model->set_client();
      $this->load->view('pages/success');
    }
  }
}