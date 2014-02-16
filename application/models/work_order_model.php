<?php
class Work_order_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper(array('date', 'security'));
  }

  public function get_wo($UID) {
    $this->db->select('*');
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('work_order.UID' => $UID));
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_open_wo() {
    $this->db->select('*');
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('completed_by' => NULL));
    $query = $this->db->get();
    return $query->result_array();
  }

  public function set_work_order($user)
  {
    $this->load->model('users_model');
    $data = array(
      'created_by' => $this->users_model->get_UID($user),
      'modified_by' => $this->users_model->get_UID($user),
      'client_requesting' => $this->input->post('uid'),
      'job_type' => $this->input->post('job-type'),
      'created_on' => mdate("%Y-%m-%d %H:%i:%s.%u"),
      'additional_info' => $this->input->post('additional-info')
    );

    $this->db->insert('work_order', $data);
  }

  public function set_assigned_to($wo, $user)
  {
    $this->load->model('users_model');
    $user_uid = $this->users_model->get_UID($user);
    $this->db->from('work_order');
    $this->db->where('UID',$wo);
    $this->db->update('work_order', array('assigned_to' => $user_uid));
  }

  public function unset_assigned_to($wo)
  {
    $this->db->from('work_order');
    $this->db->where('UID',$wo);
    $this->db->update('work_order', array('assigned_to' => NULL));
  }
}
