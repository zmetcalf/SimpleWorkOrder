
<?php
class Client_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->helper('security');
  }

  public function set_client()
  {
    $data = array(
      'last_name' => $this->input->post('last-name'),
      'first_name' => $this->input->post('first-name'),
      'street_address' => $this->input->post('street-address'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'zip_code' => $this->input->post('zip-code'),
      'primary_phone' => $this->input->post('primary-phone'),
      'secondary_phone' => $this->input->post('secondary-phone'),
      'additional_info' => $this->input->post('additional-info')
    );
    $data = $this->set_geocode($data);

    $this->db->insert('client', $data);
  }

  private function set_geocode($data) {
    // Untested - may not work at all...
    // Need to rewrite Connection.php to use cURL
    $this->load->library(array('Geocoding'));
    $connection = new Connection('74075466f76545c5b41ca1bc498e9adf');
    $address = $data['street-address'] . ',' . $data['city'] . ',' . $data['state'] .
                ',' . 'USA';
    $results = cm_find($connection, $address, 10, 0);
    $result = $results->results[0];
    $data['geo_lat'] = $result->properties_to_string();
    $data['geo_lon'] = $result->centroid->to_string();
    return $data;
  }
}
