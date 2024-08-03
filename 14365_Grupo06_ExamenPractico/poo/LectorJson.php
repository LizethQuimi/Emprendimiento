<?php
class LectorJSON {
    private $data;
  
    public function __construct($jsonPath) {
      $jsonString = file_get_contents($jsonPath);
      $this->data = json_decode($jsonString, true);
    }
  
    public function getCountryNames() {
      $countryNames = array_keys($this->data);
      return $countryNames;
    }
  
    public function getCountry($countryName) {
      if (isset($this->data[$countryName])) {
        return $this->data[$countryName];
      }
      return null;
    }
  
    public function getProvinces($countryName) {
      $country = $this->getCountry($countryName);
      if ($country === null || !isset($country['provincias'])) {
        return null;
      }
      $provinces = array_keys($country['provincias']);
      return $provinces;
    }
  
    public function getCities($countryName, $provinceName) {
      $country = $this->getCountry($countryName);
      if ($country === null || !isset($country['provincias'][$provinceName]['ciudades'])) {
        return null;
      }
      $ciudades = $country['provincias'][$provinceName]['ciudades'];
      $cityNames = array();
      foreach ($ciudades as $ciudad) {
          if (isset($ciudad['nombre'])) {
              $cityNames[] = $ciudad['nombre'];
          }
      }
      return $cityNames;
    }
}
?>
