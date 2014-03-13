<?php
class Work_order_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('date', 'security'));
  }

  public function get_wo($UID) {
    // Used by view_wo go get info related to a work order
    if ($this->get_assigned_to($UID)) {
      $this->db->select('users.first_name as users_first_name, ' .
                        'users.last_name as users_last_name, ' .
                        'users.UID as users_uid');
      $this->db->join('users', 'users.UID = work_order.assigned_to');
    }

    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid,' .
                      'work_order.created_on as wo_created_on, ' .
                      'work_order.assigned_to, work_order.completed_by' , FALSE);
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

  public function get_all_stale_open_wo() {
    // Used by map to get all open work orders that are assigned but older than 30 days
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $where_string = 'assigned_to IS NULL AND completed_by IS NULL AND created_on < '
                    . mdate("%Y%m%d", (time() - (30 * 24 * 60 * 60)));
    $this->db->where($where_string);
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
    $this->db->where('assigned_to IS NOT NULL AND completed_by IS NULL');
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
    $where_string = 'assigned_to IS NOT NULL AND completed_by IS NULL AND created_on < '
                    . mdate("%Y%m%d", (time() - (30 * 24 * 60 * 60)));
    $this->db->where($where_string);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_assigned_to($UID) {
    // Returns who is assigned to a particular work order
    $query = $this->db->get_where('work_order', array('UID' => $UID));
    return $query->row_array()['assigned_to'];
  }

  public function get_completed_by($UID) {
    // Returns who completed a particular work order
    $query = $this->db->get_where('work_order', array('UID' => $UID));
    return $query->row_array()['completed_by'];
  }

  public function get_wo_assigned($UID) {
    // Used by sidebar and user view to load work orders assigned to a certain volunteer
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('assigned_to' => $UID, 'completed_by' => NULL));
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_wo_assigned_closed($UID) {
    // Used by user view to load closed work orders
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('assigned_to' => $UID, 'completed_by' => $UID));
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_open_client_wos($UID) {
    // Used by client view to load open work orders assigned to a certain client
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('client_requesting' => $UID, 'completed_by' => NULL));
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_closed_client_wos($UID) {
    // Used by client view to load closed work orders assigned to a certain client
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $where_string = 'completed_by IS NOT NULL AND client_requesting = ' . $UID;
    $this->db->where($where_string);
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
      'created_on' => mdate("%Y-%m-%d %H:%i:%s"),
      'additional_info' => $this->input->post('additional-info')
    );

    $this->db->insert('work_order', $data);
    return $this->db->insert_id();
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

    if(!$this->get_assigned_to($wo)) {
      $data['assigned_to'] = $user_uid;
    }
    $data['completed_by'] = $user_uid;

    $this->db->from('work_order');
    $this->db->where('UID',$wo);
    $this->db->update('work_order', $data);
  }

  public function unset_assigned_to($wo)
  {
    $this->db->from('work_order');
    $this->db->where('UID',$wo);
    $this->db->update('work_order', array('assigned_to' => NULL));
  }

  public function update_wo($UID) {
    $this->load->model('users_model');
    $data = array(
      'modified_by' => $this->users_model->get_UID($user),
      'client_requesting' => $this->input->post('uid'),
      'job_type' => $this->input->post('job_type'),
      'additional_info' => $this->input->post('additional_info')
    );

    $this->db->from('work_order');
    $this->db->where('UID',  $UID);
    $this->db->update('work_order', $data);
  }

  public function search_wos($job_type = '') {
    $this->db->select('client.*', FALSE);
    $this->db->select('work_order.job_type, work_order.additional_info as ' .
                      'wo_additional_info, work_order.UID as wo_uid', FALSE);
    $this->db->from('work_order');
    $this->db->join('client', 'client.UID = work_order.client_requesting');
    $this->db->where(array('job_type' => $job_type));
    $query = $this->db->get();
    return $query->result_array();
  }
}
