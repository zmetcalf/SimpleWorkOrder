<?php

class View_wo extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('work_order_model');
  }

  public function view_wo($record)
  {
    $this->load->helper('form');

    $data['is_admin'] = FALSE;
    $data['assigned_to_another_user'] = FALSE;
    $data['completed'] = FALSE;
    $data['update_status'] = '';
    $data['record'] = $record;

    if($this->session->userdata('user_type') == 'Administrator') {
      $data['is_admin'] = TRUE;
    }

    // Handles buttons in view
    if($this->input->post('assign')) {
      $this->work_order_model->set_assigned_to($record,
        $this->session->userdata('username'));
      $this->email_assigned_wo($record);
      $data['update_status'] = 'assigned';
    }
    else if($this->input->post('unassign')) {
      $this->work_order_model->unset_assigned_to($record);
      $data['update_status'] = 'unassigned';
    }
    else if($this->input->post('completed')) {
      $this->work_order_model->set_completed($record,
        $this->session->userdata('username'));
      $data['update_status'] = 'completed';
    }

    // TODO add error handling if wo not found
    $data['result'] = $this->work_order_model->get_wo($record);

    // Logic to set what buttons are showing.

    $user_id = $this->users_model->get_UID(
      $this->session->userdata('username'));

    if($this->work_order_model->get_completed_by($record)) {
      $data['completed'] = TRUE;
    }

    if($this->work_order_model->get_assigned_to($record) === $user_id) {
      $data['assigned_to_user'] = TRUE;
      $data['assigned_to_another_user'] = TRUE;
    }
    else {
      $data['assigned_to_user'] = FALSE;
      if($this->work_order_model->get_assigned_to($record)) {
        // Cannot signup when someone is assigned to the wo
        $data['assigned_to_another_user'] = TRUE;
      }
    }

    $this->load->view('dashboard/admin/view_wo',$data);
  }

  private function email_assigned_wo($UID) {
    $data = $this->work_order_model->get_wo($UID);

    $this->config->load('email');
    $this->load->library('email');
    $this->email->from($this->config->item('smtp_email_address'), 'Admin');
    $this->email->to($this->users_model->get_email(
                     $this->work_order_model->get_assigned_to($UID)));
    $this->email->subject('SimpleWorkOrder - New Work Order Assigned');

    $message = $this->load->view('dashboard/admin/email_templates/assign_wo', $data, TRUE);

    $this->email->message($message);
    $this->email->send();
  }
}
