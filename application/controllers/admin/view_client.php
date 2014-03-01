<?php

class View_client extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('client_model');
  }

  public function view_client($record)
  {
    $data['result'] = $this->client_model->get_client($record);
    $data['record'] = $record;
    $this->load->view('dashboard/admin/view_client', $data);

    $this->load->library('../controllers/admin/list_wo');
    $this->list_wo->list_client_wos($record);
  }
}