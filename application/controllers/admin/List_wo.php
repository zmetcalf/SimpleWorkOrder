<?php

class List_wo extends MY_Controller {

  protected $controller = 'list_wo';

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

  public function completed_wo() {
    $data['page_title'] = "Completed Work Orders";
    $data['result'] = $this->work_order_model->get_all_completed_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }
}
