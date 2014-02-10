<?php
class Work_order_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper(array('date', 'security'));
  }

  public function set_work_order($user)
  {
    $data = array(
      'created_by' => $user,
      'modified_by' => $user,
      'client_requesting' => $this->input->post('client-requesting'),
      'job_type' => $this->input->post('job-type'),
      'created_on' => mdate("Year: %Y Month: %m Day: %d - %h:%i %a"),
      'additional_info' => $this->input->post('additional-info')
    );

    $this->db->insert('work_order', $data);
  }
}
