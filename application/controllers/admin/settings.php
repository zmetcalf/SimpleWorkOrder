<?php

class Settings extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function settings()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('password', 'Password', 'trim|matches[passconf]|min_length[8]|md5');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

    $this->form_validation->set_rules('street-address', 'Street Address', 'trim|xss_clean');
    $this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
    $this->form_validation->set_rules('state', 'State', 'trim|xss_clean');
    $this->form_validation->set_rules('zip-code', 'Zip Code', 'trim|xss_clean');
    $this->form_validation->set_rules('primary-phone', 'Primary Phone', 'trim|xss_clean');
    $this->form_validation->set_rules('secondary-phone', 'Secondary Phone', 'trim|xss_clean');

    if($this->form_validation->run() == FALSE) {
      $data['user'] = $this->users_model->get_user($this->users_model->get_UID(
                      $this->session->userdata('username')));
      $data['updated'] = FALSE;
      $this->load->view('dashboard/admin/settings', $data);
    }
    else {
      if($this->input->post('password')) {
        $this->users_model->update_password($this->users_model->get_UID(
                                            $this->session->userdata('username')));
      }
      $this->users_model->update_contact_info($this->users_model->get_UID(
                                              $this->session->userdata('username')));
      $data['user'] = $this->users_model->get_user($this->users_model->get_UID(
                      $this->session->userdata('username')));
      $data['updated'] = TRUE;
      $this->load->view('dashboard/admin/settings', $data);
    }
  }
}