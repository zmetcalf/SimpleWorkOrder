<?php

class Lookup extends MY_Controller {

  protected $controller = 'lookup';

  public function __construct()
  {
    parent::__construct();
  }

  public function lookup()
  {
    if(!($this->session->userdata('user_type') == 'Administrator')) {
      $this->load->helper('url');
      redirect('/dashboard');
    }
    $this->load->view('dashboard/admin/lookup');
  }
}
