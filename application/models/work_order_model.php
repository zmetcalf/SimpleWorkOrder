<?php
class Work_order_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper(array('date', 'security'));
  }

  public function set_work_order($user)
  {
    $this->load->model('users_model');
    $data = array(
      'created_by' => $this->users_model->get_UID($user),
      'modified_by' => $this->users_model->get_UID($user),
      'client_requesting' => $this->input->post('uid'),
      'job_type' => $this->input->post('job-type'),
      'created_on' => mdate("Year: %Y Month: %m Day: %d - %h:%i %a"),
      'additional_info' => $this->input->post('additional-info')
    );

    $this->db->insert('work_order', $data);
  }
}
