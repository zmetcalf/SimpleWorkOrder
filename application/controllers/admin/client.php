<?php

class Client extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('client_model');
  }

  public function create_client()
  {
    if(!($this->session->userdata('user_type') == 'Administrator')) {
      $this->load->helper('url');
      redirect('/dashboard');
    }
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->set_rules();

    if($this->form_validation->run() == FALSE)
    {
      if($this->input->post()) {
        $this->data = $this->input->post();
      }
      else {
        $this->generate_clean_data();
      }
      $this->data['page_header'] = 'Create Client';
      $this->data['submit_button'] = 'Create Client';
      $this->load->view('dashboard/admin/change_client', $this->data);
    }
    else
    {
      $this->view_client($this->client_model->set_client());
    }
  }

  public function modify_client($record)
  {
    if(!($this->session->userdata('user_type') == 'Administrator')) {
      $this->load->helper('url');
      redirect('/dashboard');
    }
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->set_rules();

    if($this->form_validation->run() == FALSE)
    {
      $this->data = $this->client_model->get_client($record);
      if($this->input->post()) {
        $this->data = $this->input->post();
      }
      $this->data['page_header'] = 'Modify Client';
      $this->data['submit_button'] = 'Modify Client';
      $this->data['record'] = $record;
      $this->load->view('dashboard/admin/change_client', $this->data);
    }
    else
    {
      $this->client_model->update_client($record);
      $this->view_client($record);
    }
  }

  public function view_client($record) {
    if($this->session->userdata('user_type') == 'Administrator') {
      $data['admin'] = TRUE;
    }
    else {
      $data['admin'] = FALSE;
    }
    $data['result'] = $this->client_model->get_client($record);
    $data['record'] = $record;
    $this->load->view('dashboard/admin/view_client', $data);

    $this->load->library('../controllers/admin/list_wo');
    $this->list_wo->list_client_wos($record);
    $this->load->view('dashboard/admin/subforms/modify_geocode');
  }

  private function set_rules() {
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('street_address', 'Street Address', 'trim|required|xss_clean');
    $this->form_validation->set_rules('unit_number', 'Unit Number', 'trim|xss_clean');
    $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
    $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
    $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|required|xss_clean');
    $this->form_validation->set_rules('primary_phone', 'Primary Phone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('secondary_phone', 'Secondary Phone', 'trim|xss_clean');
    $this->form_validation->set_rules('additional_info', 'Additional Info', 'xss_clean');
  }

  private function generate_clean_data() {
    $this->data = array(
      'UID' => '',
      'first_name' => '',
      'last_name' => '',
      'street_address' => '',
      'unit_number' => '',
      'city' => '',
      'state' => '',
      'zip_code' => '',
      'primary_phone' => '',
      'secondary_phone' => '',
      'additional_info' => '',
    );
  }
}