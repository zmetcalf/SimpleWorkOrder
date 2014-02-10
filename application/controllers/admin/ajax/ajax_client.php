<?php

class Ajax_client extends CI_controller
{
  public function __construct() {
    parent::__construct();
  }

  public function search_client() {
    $this->load->model('client_model');
    $result = get_search_by_name(trim($__POST['first-name']), trim($__POST['last-name']));
    if(!$result) {
      echo "No results found.";
    }
    else {
      echo $result;
    }
  }
}