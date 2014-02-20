<?php
class Work_order_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper(array('date', 'security'));
  }

  public function get_wo($UID) {
    // Used by view_wo go get info related to a work order
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid,' .
                      'work_order.created_on as wo_created_on', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('work_order.UID' => $UID));
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_open_wo() {
    // Used by map to get all open work orders that are not assigned
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('assigned_to' => NULL));
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_assigned_wo() {
    // Used by map to get all open work orders that are assigned
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where('assigned_to IS NOT NULL and completed_by IS NULL');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_stale_assigned_wo() {
    // Used by map to get all open work orders that are assigned but older than 30 days
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $where_string = 'assigned_to IS NOT NULL and completed_by IS NULL and created_on < '
                    . mdate("%Y-%m-%d", (time() - 30 * 24 * 60 * 60));
    $this->db->where($where_string);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_assigned_to($UID) {
    // Returns who is assigned to a particular work order
    $query = $this->db->get_where('work_order', array('UID' => $UID));
    return $query->row_array()['assigned_to'];
  }

  public function get_wo_assigned($UID) {
    // Used by sidebar to load work orders assigned to a certain volunteer
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('assigned_to' => $UID, 'completed_by' => NULL));
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

  public function set_completed($wo, $user)
  {
    $this->load->model('users_model');
    $user_uid = $this->users_model->get_UID($user);
    $this->db->from('work_order');
    $this->db->where('UID',$wo);
    $this->db->update('work_order', array('completed_by' => $user_uid));
  }

  public function unset_assigned_to($wo)
  {
    $this->db->from('work_order');
    $this->db->where('UID',$wo);
    $this->db->update('work_order', array('assigned_to' => NULL));
  }
}
