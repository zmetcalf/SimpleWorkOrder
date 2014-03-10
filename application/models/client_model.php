<?php
class Client_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper('security');
  }

  public function set_client()
  {
    $data = array(
      'last_name' => $this->input->post('last_name'),
      'first_name' => $this->input->post('first_name'),
      'street_address' => $this->input->post('street_address'),
      'unit_number' => $this->input->post('unit_number'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip_code'),
      'primary_phone' => $this->input->post('primary_phone'),
      'secondary_phone' => $this->input->post('secondary_phone'),
      'additional_info' => $this->input->post('additional_info')
    );
    $data = $this->set_geocode($data);

    $this->db->insert('client', $data);
    return $this->db->insert_id();
  }

  public function get_client($UID) {
    $query = $this->db->get_where('client', array('UID' => $UID));
    return $query->row_array();
  }

  public function get_search_by_name($first_name = '', $last_name = '') {
    if($first_name and $last_name) {
      $query = $this->db->get_where('client', array('first_name' => $first_name,
                                                    'last_name' => $last_name));
    }
    else if($first_name) {
      $query = $this->db->get_where('client', array('first_name' => $first_name));
    }
    else if($last_name) {
      $query = $this->db->get_where('client', array('last_name' => $last_name));
    }
    else {
      return FALSE;
    }
    return $query->result_array();
  }

  private function set_geocode($data) {
    $this->load->library(array('Geocode'));
    $address = $data['street_address'] . ' ' . $data['city'] . ' ' . $data['state'];
    $data['geocode'] = $this->geocode->get_geocode_info($address);
    return $data;
  }

  public function update_client($UID) {
    $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'street_address' => $this->input->post('street_address'),
      'unit_number' => $this->input->post('unit_number'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip_code'),
      'primary_phone' => $this->input->post('primary_phone'),
      'secondary_phone' => $this->input->post('secondary_phone'),
      'additional_info' => $this->input->post('additional_info')
    );

    if($this->check_address_update($UID, $data)) {
      $data = $this->set_geocode($data);
    }

    $this->db->from('client');
    $this->db->where('UID', $UID);
    $this->db->update('client', $data);
  }

  public function update_geocode($UID, $centerpoint) {
    $this->db->from('client');
    $this->db->where('UID', $UID);
    $this->db->update('client', array('geocode' => $centerpoint));
  }

  private function check_address_update($UID, $client_array) {
    // Checks only those that are used for geocoding
    $current_data = $this->get_client($UID);
    if($current_data['street_address'] == $client_array['street_address'] and
       $current_data['city'] == $client_array['city'] and
       $current_data['state'] == $client_array['state']) {
         return FALSE;
    }
    return TRUE;
  }
}
