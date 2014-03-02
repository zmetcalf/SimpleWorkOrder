<?php

class Settings extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function settings()
  {
    $data['user'] = $this->users_model->get_user($this->session->userdata('username'));

    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|md5');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]|valid_email');

    $this->form_validation->set_rules('street-address', 'Street Address', 'trim|xss_clean');
    $this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
    $this->form_validation->set_rules('state', 'State', 'trim|xss_clean');
    $this->form_validation->set_rules('zip-code', 'Zip Code', 'trim|xss_clean');
    $this->form_validation->set_rules('primary-phone', 'Primary Phone', 'trim|xss_clean');
    $this->form_validation->set_rules('secondary-phone', 'Secondary Phone', 'trim|xss_clean');

    if($this->form_validation->run() == FALSE) {
      $this->load->view('dashboard/admin/settings');
    }
    else {
      $this->users_model->update_user();
      $this->load->view('pages/success');
    }
  }
}