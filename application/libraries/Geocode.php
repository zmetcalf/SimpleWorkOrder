<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geocode {

  public function get_geocode_info($address) {
    $c_uri = curl_init();
    // $location = curl_escape($c_uri, $address); // Will come back when PHP 5.5 is norm
    $location = $this->encode_url($address);
    $uri = "http://nominatim.openstreetmap.org/search/{$location}?format=xml&addressdetails=0";
    curl_setopt($c_uri, CURLOPT_URL, $uri);
    curl_setopt($c_uri, CURLOPT_RETURNTRANSFER, TRUE);

    try {
      $request = curl_exec($c_uri);
      curl_close($c_uri);
      $xml = new SimpleXMLElement($request);
      if ($xml->place) {
        return $xml->place['lat'] . ',' . $xml->place['lon'];
      }
      else {
        return '';
      }
    } catch (Exception $e) {
      echo $e;
      return null;
    }
  }

/**
* @param $url
*     The URL to encode
*
* @return
*     A string containing the encoded URL with disallowed
*     characters converted to their percentage encodings.
*
* Courtesy of http://publicmind.in/blog/url-encoding/
*/
  private function encode_url($url) {
    $reserved = array(
      ":" => '!%3A!ui',
      "/" => '!%2F!ui',
      "?" => '!%3F!ui',
      "#" => '!%23!ui',
      "[" => '!%5B!ui',
      "]" => '!%5D!ui',
      "@" => '!%40!ui',
      "!" => '!%21!ui',
      "$" => '!%24!ui',
      "&" => '!%26!ui',
      "'" => '!%27!ui',
      "(" => '!%28!ui',
      ")" => '!%29!ui',
      "*" => '!%2A!ui',
      "+" => '!%2B!ui',
      "," => '!%2C!ui',
      ";" => '!%3B!ui',
      "=" => '!%3D!ui',
      "%" => '!%25!ui',
    );

    $url = rawurlencode($url);
    $url = preg_replace(array_values($reserved), array_keys($reserved), $url);
    return $url;
  }
}