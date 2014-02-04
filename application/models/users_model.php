<?php
class Users_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper('security');
  }

  public function get_username($str)
  {
    $query = $this->db->get_where('users', array('user_name' => $str));
    return $query->result_array();
  }

  public function get_password($str)
  {
    // TODO - This needs to check against a particular user
    $query = $this->db->get_where('users', array('password' => do_hash($str, 'md5')));
    return $query->result_array();
  }

  public function set_user()
  {
    // This will be expanded later - used now for testing
    $data = array(
      'user_name' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'user_type' => 'admin',
      'email' => 'sample@email.com',
      'active' => 'active'
    );
    $this->db->insert('users', $data);
  }

}
