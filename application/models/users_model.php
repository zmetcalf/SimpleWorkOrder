<?php
class Users_model extends CI_Model {

  // safe_select does not select the md5 password
  private $safe_select = 'UID, first_name, last_name, user_name, user_type,
                          email, street_address, city, state, zip_code,
                          primary_phone, secondary_phone, specialty, active, opt_in';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('security', 'string');
  }

  public function get_user($UID) {
    $this->db->select($this->safe_select, FALSE);
    $this->db->from('users');
    $this->db->where(array('UID' => $UID));
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_username()
  {
    $query = $this->db->get_where('users', array('user_name' =>
                                  $this->input->post('username')));
    return $query->row_array();
  }

  public function get_email($UID)
  {
    $query = $this->db->get_where('users', array('UID' => $UID));
    $row = $query->row_array();
    return $row['email'];
  }

  public function get_user_type($username)
  {
    $query = $this->db->get_where('users', array('user_name' => $username));
    return $query->row_array()['user_type'];
  }

  public function get_UID($username) {
    $query = $this->db->get_where('users', array('user_name' => $username));
    $row = $query->row_array();
    if ($row) {
      return $row['UID'];
    }
    return FALSE;
  }

  public function get_username_and_password()
  {
    $query = $this->db->get_where('users', array('user_name' =>
                                  $this->input->post('username')));
    if(!$query->row_array()) {
      return FALSE;
    }
    else if($query->row_array()['password'] == do_hash($this->input->post('password'), 'md5')) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function get_pending() {
    $query = $this->db->get_where('users', array('active' => 'Pending'));
    return $query->result_array();
  }

  public function set_user()
  {
    $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'user_name' => $this->input->post('user_name'),
      'user_type' => $this->input->post('user_type'),
      'email' => $this->input->post('email'),
      'specialty' => $this->input->post('specialty'),
      'street_address' => $this->input->post('street_address'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip_code'),
      'primary_phone' => $this->input->post('primary_phone'),
      'secondary_phone' => $this->input->post('secondary_phone'),
      'active' => 'Active',
      'opt_in' => ($this->input->post('opt_in') === FALSE) ? 0 : 1,
    );
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }

  public function set_user_signup()
  {
    $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'user_name' => $this->input->post('user_name'),
      'password' => random_string('unique'), // Will reset when activated
      'user_type' => 'Volunteer',
      'email' => $this->input->post('email'),
      'specialty' => $this->input->post('specialty'),
      'primary_phone' => $this->input->post('primary_phone'),
      'active' => 'Pending',
      'opt_in' => 1 // True
    );
    $this->db->insert('users', $data);
  }

  public function activate_user($UID) {
    $this->db->from('users');
    $this->db->where('UID', $UID);
    $this->db->update('users', array('active' =>'Active'));
  }

  public function inactivate_user($UID) {
    $this->db->from('users');
    $this->db->where('UID', $UID);
    $this->db->update('users', array('active' =>'Inactive'));
  }

  public function reset_password($UID) {
    $password = random_string('alnum', 10);
    $this->db->from('users');
    $this->db->where('UID', $UID);
    $this->db->update('users', array('password' => do_hash($password, 'md5')));
    return $password;
  }

  public function update_user($UID) {
    $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'user_name' => $this->input->post('user_name'),
      'user_type' => $this->input->post('user_type'),
      'email' => $this->input->post('email'),
      'specialty' => $this->input->post('specialty'),
      'street_address' => $this->input->post('street_address'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip_code'),
      'primary_phone' => $this->input->post('primary_phone'),
      'secondary_phone' => $this->input->post('secondary_phone'),
      'active' => 'Active',
      'opt_in' => ($this->input->post('opt_in') === FALSE) ? 0 : 1,
    );

    $this->db->from('users');
    $this->db->where('UID',  $UID);
    $this->db->update('users', $data);
  }

  public function update_contact_info($UID) {
    $data = array(
      'email' => $this->input->post('email'),
      'street_address' => $this->input->post('street-address'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip-code'),
      'primary_phone' => $this->input->post('primary-phone'),
      'secondary_phone' => $this->input->post('secondary-phone'),
      'opt_in' => ($this->input->post('opt_in') === FALSE) ? 0 : 1,
    );
    $this->db->from('users');
    $this->db->where('UID',  $UID);
    $this->db->update('users', $data);
  }

  public function update_password($UID) {
    $this->db->from('users');
    $this->db->where('UID',  $UID);
    $this->db->update('users', array('password' => $this->input->post('password')));
  }

  public function search_users($first_name = '', $last_name = '', $username = '',
                               $email = '') {
    if($username) {
      $query = $this->db->get_where('users', array('user_name' => $username));
    }
    else if($email) {
      $query = $this->db->get_where('users', array('email' => $email));
    }
    else if($first_name and $last_name) {
      $query = $this->db->get_where('users', array('first_name' => $first_name,
                                                    'last_name' => $last_name));
    }
    else if($first_name) {
      $query = $this->db->get_where('users', array('first_name' => $first_name));
    }
    else if($last_name) {
      $query = $this->db->get_where('users', array('last_name' => $last_name));
    }
    else {
      return FALSE;
    }
    return $query->result_array();
  }
}
