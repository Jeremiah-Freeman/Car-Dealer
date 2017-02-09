<?php
class Car
{
    private $price;
    private $miles;
    private $make;
    private $URL;


    function __construct($price,$miles,$make,$URL) {
        $this->price =  $price;
        $this->miles = $miles;
        $this->make = $make;
        $this->URL  = $URL;
    }
    function worthBuying($max_price) {
        return $this->getPrice() < $max_price;
    }
    function maxMiles($max_miles) {
        return $this->miles < $max_miles;
    }
    function getMiles() {
        return $this->miles;
    }
    function getMake() {
        return $this->make;
    }
    function getPrice() {
        return $this->price;
    }
    function getURL() {
        return $this->URL;
    }
    function setMiles($new_miles) {
        $this->miles = $new_miles;
    }
    function setMake($new_make) {
        $this->make = (string) $new_make;
    }
    function setPrice($new_price) {
        $this->price = $new_price;
    }
    function setURL($URL) {
        $this->URL = $new_URL;
    }
    function save() {
      array_push($_SESSION['list_of_cars'], $this);
    }

    static function getAll() {
      return $_SESSION['list_of_cars'];
    }
    static function deleteListings() {
      $_SESSION['list_of_cars'] = array();
    }
    function deleteCurrentListing() {
      unset($_SESSION['list_of_cars'][array_search($this, $_SESSION['list_of_cars'])]);
    }

}
 ?>
