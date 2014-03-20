<?php

class List_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('work_order_model');
  }

  // This is for the list of work orders on the volunteer page

  public function assigned_wo_user() {
    $data['page_title'] = "Your Assigned Work Orders";
    $data['result'] = $this->work_order_model->get_wo_assigned(
                      $this->session->userdata('user_id'));
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  // These are for the links on the admin sidebar

  public function unassigned_wo() {
    $data['page_title'] = "Unassigned Work Orders";
    $data['result'] = $this->work_order_model->get_open_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  public function stale_unassigned_wo() {
    $data['page_title'] = "Stale Unassigned Work Orders";
    $data['result'] = $this->work_order_model->get_all_stale_open_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  public function assigned_wo() {
    $data['page_title'] = "Assigned Work Orders";
    $data['result'] = $this->work_order_model->get_all_assigned_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  public function stale_assigned_wo() {
    $data['page_title'] = "Stale Assigned Work Orders";
    $data['result'] = $this->work_order_model->get_all_stale_assigned_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  // These are for displaying beside the client or user

  public function assigned_to_user($UID) {
    $data['open'] = $this->work_order_model->get_wo_assigned($UID);
    $data['closed'] = $this->work_order_model->get_wo_assigned_closed($UID);
    $this->load->view('dashboard/admin/subforms/list_wos', $data);
  }

  public function client_wos($UID) {
    $data['open'] = $this->work_order_model->get_all_open_client_wos($UID);
    $data['closed'] = $this->work_order_model->get_all_closed_client_wos($UID);
    $this->load->view('dashboard/admin/subforms/list_wos', $data);
  }
}
