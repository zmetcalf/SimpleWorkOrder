<?php
class Users_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper('security');
  }

  public function get_username($str)
  {
    return $this->db->get_where('users', array('user_name' => $str));
  }

  public function get_password($str)
  {
    return $this->db->get_where('users', array('password' => do_hash($str, 'md5')));
  }

  public function set_user($user_array)
  {
    // This will be expanded later - used now for testing
    $this->db->instert('users', $user_array);
  }

}
