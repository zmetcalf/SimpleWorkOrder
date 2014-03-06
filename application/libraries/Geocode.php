<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geocode {

  public function get_geocode_info($address) {
    $c_uri = curl_init();
    $location = curl_escape($c_uri, $address);
    $uri = "http://nominatim.openstreetmap.org/search/{$location}?format=xml&addressdetails=0";
    curl_setopt($c_uri, CURLOPT_URL, $uri);
    curl_setopt($c_uri, CURLOPT_RETURNTRANSFER, TRUE);

    try {
      $request = curl_exec($c_uri);
      curl_close($c_uri);
      $xml = new SimpleXMLElement($request);
      return $xml->place['lat'] . ',' . $xml->place['lon'];
      // TODO Add error handling for no coordinates.
    } catch(Exception $e) {
      echo $e;
      return null;
    }
  }
}