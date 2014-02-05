<?php

class Logout extends CI_Controller {

  public function index()
  {
    $this->load->library(array('session', '../controllers/login'));
    $this->session->sess_destroy();
    $this->login->index();
  }
}