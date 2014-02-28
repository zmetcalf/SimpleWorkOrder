<?php

class Ajax extends CI_controller
{
  public function index($segment, $ajax_class='')
  {
    if(!$this->session->userdata('logged_in')) {
      return FALSE; // Session protects AJAX security
    }
    if($segment=='admin' and $ajax_class=='search-clients') {
      $this->load->library('../controllers/admin/ajax/ajax_client');
      $this->ajax_client->search_client(trim($this->input->post('first-name')),
              trim($this->input->post('last-name')));
    }
    else if($segment=='admin' and $ajax_class=='search-users') {
      $this->load->library('../controllers/admin/ajax/ajax_user');
      $this->ajax_user->search_users(trim($this->input->post('first-name')),
              trim($this->input->post('last-name')),
              trim($this->input->post('username')),
              trim($this->input->post('email')));
    }
    else if($segment=='admin' and $ajax_class=='search-wos') {
      $this->load->library('../controllers/admin/ajax/ajax_wo');
      $this->ajax_wo->search_wos($this->input->post('job-type'));
    }
    else if($segment=='admin' and $ajax_class=='get-client') {
      $this->load->library('../controllers/admin/ajax/ajax_client');
      $this->ajax_client->get_client($this->input->post('UID'));
    }
    else if($segment=='admin' and $ajax_class=='get-open-wo') {
      $this->load->library('../controllers/admin/ajax/ajax_wo');
      echo $this->ajax_wo->get_open_wo();
    }
  }
}