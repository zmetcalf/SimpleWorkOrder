<?php
class Ajax extends CI_controller
{

  public function __construct() {
    parent::__construct();
    if(!$this->session->userdata('logged_in')) {
      return FALSE; // Session protects AJAX security
    }
  }

  public function search_client() {
    $this->load->model('client_model');
    $result = $this->client_model->get_search_by_name(
                trim($this->input->post('first-name')),
                trim($this->input->post('last-name')));
    if($result) {
      $this->output->set_content_type('application/json')
        ->set_output(json_encode($result));
    }
    else {
      return FALSE;
    }
  }

  public function get_client() {
    $this->load->model('client_model');
    $data['result'] = $this->client_model->get_client($this->input->post('UID'));
    $this->load->view('dashboard/admin/subforms/client_info', $data);
  }

  public function set_geocode_centerpoint() {
    $this->load->model('client_model');
    $this->client_model->update_geocode($this->input->post('UID'),
              trim($this->input->post('centerpoint')));
  }

  public function get_open_wo() {
    $this->load->model('work_order_model');
    $result = $this->work_order_model->get_open_wo();
    $this->output->set_content_type('application/json')
      ->set_output(json_encode($result));
  }

  public function search_wos() {
    $this->load->model('work_order_model');
    $result = $this->work_order_model->search_wos($this->input->post('job-type'));
    if($result) {
      $this->output->set_content_type('application/json')
        ->set_output(json_encode($result));
    }
    else {
      return FALSE;
    }
  }

  public function search_users() {
    $this->load->model('users_model');
    $result = $this->users_model->search_users(trim($this->input->post('first-name')),
              trim($this->input->post('last-name')),
              trim($this->input->post('username')),
              trim($this->input->post('email')));
    if($result) {
      $this->output->set_content_type('application/json')
        ->set_output(json_encode($result));
    }
    else {
      return FALSE;
    }
  }
}
