<?php

class Ajax_user extends CI_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function search_users($first_name='', $last_name='', $username='',
                               $email='') {
    $this->load->model('users_model');
    $result = $this->users_model->search_users($first_name, $last_name,
                                                     $username, $email);
    $this->output->set_content_type('application/json')
      ->set_output(json_encode($result));
  }
}