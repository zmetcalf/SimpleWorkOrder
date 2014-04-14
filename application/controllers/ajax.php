<?php
class Ajax extends CI_controller
{

  public function __construct() {
    parent::__construct();
  }

  public function search_client() {
    if ($this->session->userdata('logged_in')) {
      $this->load->model('client_model');
      $result = $this->client_model->get_search_by_name(
                  trim($this->input->post('first-name')),
                  trim($this->input->post('last-name')));
      if ($result) {
        $this->output->set_content_type('application/json')
          ->set_output(json_encode($result));
      }
      else {
        return FALSE;
      }
    }
  }

  public function get_client() {
    if ($this->session->userdata('logged_in')) {
      $this->load->model('client_model');
      $data['result'] = $this->client_model->get_client($this->input->post('UID'));
      $this->load->view('dashboard/admin/subforms/client_info', $data);
    }
  }

  public function set_geocode_centerpoint() {
    if ($this->session->userdata('logged_in')) {
      $this->load->model('client_model');
      $this->client_model->update_geocode($this->input->post('UID'),
               trim($this->input->post('centerpoint')));
    }
  }

  public function get_open_wo() {
    if ($this->session->userdata('logged_in')) {
      $this->load->model('work_order_model');
      $result = $this->work_order_model->get_open_wo();
      $this->output->set_content_type('application/json')
        ->set_output(json_encode($result));
    }
  }

  public function search_wos() {
    if ($this->session->userdata('logged_in')) {
      $this->load->model('work_order_model');
      $result = $this->work_order_model->search_wos($this->input->post('job-type'));
      if ($result) {
        $this->output->set_content_type('application/json')
          ->set_output(json_encode($result));
      }
      else {
        return FALSE;
      }
    }
  }

  public function search_users() {
    if ($this->session->userdata('logged_in')) {
      $this->load->model('users_model');
      $result = $this->users_model->search_users(trim($this->input->post('first-name')),
                trim($this->input->post('last-name')),
                trim($this->input->post('username')),
                trim($this->input->post('email')));
      if ($result) {
        $this->output->set_content_type('application/json')
          ->set_output(json_encode($result));
      }
      else {
        return FALSE;
      }
    }
  }

  public function forgot_password() {
    $password = '';

    $this->load->model('users_model');

    $UID = $this->users_model->get_UID(trim($this->input->post('user_name')));
    if ($UID != array() &&
       $this->users_model->get_email($UID) == trim($this->input->post('email'))) {
          $password = $this->users_model->reset_password($UID);
          $this->email_password($this->input->post('email'), $password);
          echo TRUE;
    }
    else {
      echo FALSE;
    }
  }

  private function email_password($email, $password) {
    $this->config->load('email');
    $this->load->library('email');
    $this->email->from($this->config->item('smtp_email_address'), 'Admin');
    $this->email->to($email);
    $this->email->subject('SimpleWorkOrder New Password');
    $this->email->message('Your password has been reset to: ' . $password);
    $this->email->send();
  }
}
