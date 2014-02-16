<?php
class Users_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper('security');
  }

  public function get_username()
  {
    $query = $this->db->get_where('users', array('user_name' =>
                                  $this->input->post('username')));
    return $query->row_array();
  }

  public function get_user_type($username)
  {
    $query = $this->db->get_where('users', array('user_name' => $username));
    return $query->row_array()['user_type'];
  }

  public function get_UID($username) {
    $query = $this->db->get_where('users', array('user_name' => $username));
    $row = $query->row_array();
    return $row['UID'];
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

  public function set_user()
  {
    $data = array(
      'user_name' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'user_type' => $this->input->post('user-type'),
      'email' => $this->input->post('email'),
      'specialty' => $this->input->post('specialty'),
      'street_address' => $this->input->post('street-address'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip-code'),
      'primary_phone' => $this->input->post('primary-phone'),
      'secondary_phone' => $this->input->post('secondary-phone'),
      'active' => 'active'
    );
    $this->db->insert('users', $data);
  }

}
