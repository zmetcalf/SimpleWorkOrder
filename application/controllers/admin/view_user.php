<?php

class View_user extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function view_user($record)
  {
    $data['result'] = $this->users_model->get_user($record);
    $data['record'] = $record;
    $this->load->view('dashboard/admin/view_user', $data);

    $this->load->library('../controllers/admin/list_wo');
    $this->list_wo->list_assigned_to_user($record);
  }
}
