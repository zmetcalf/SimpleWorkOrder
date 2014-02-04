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
    return $query->result_array();
  }

  public function get_username_and_password()
  {
    $query = $this->db->get_where('users', array('user_name' =>
                                  $this->input->post('username')));
    foreach($query->result_array() as $row) {
      if($row['password'] == do_hash($this->input->post('password'), 'md5')) {
        return TRUE;
      }
    }
    return FALSE;
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
