<?php

class List_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('work_order_model');
  }

  public function list_unassigned_wo()
  {
    $data['page_title'] = "Unassigned Work Orders";
    $data['result'] = $this->work_order_model->get_open_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  public function list_stale_unassigned_wo()
  {
    $data['page_title'] = "Stale Unassigned Work Orders";
    $data['result'] = $this->work_order_model->get_all_stale_open_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  public function list_assigned_wo()
  {
    $data['page_title'] = "Assigned Work Orders";
    $data['result'] = $this->work_order_model->get_all_assigned_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }

  public function list_stale_assigned_wo()
  {
    $data['page_title'] = "Stale Assigned Work Orders";
    $data['result'] = $this->work_order_model->get_all_stale_assigned_wo();
    $this->load->view('dashboard/admin/view_wo_list', $data);
  }
}
