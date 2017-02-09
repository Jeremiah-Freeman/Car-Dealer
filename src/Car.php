<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $handler_fee = 1500;
    private $image_sorce;

    function worthBuying($max_price) {
        return $this->getPrice() < $max_price;
    }
    function maxMiles($max_miles) {
        return $this->miles < $max_miles;
    }
    function getMiles() {
        return $this->miles;
    }
    function getModel() {
        return $this->make_model;
    }
    function getPrice() {
        return $this->price;
    }
    function getHandlerFee() {
        return $this->handler_fee;
    }
    function getImage() {
        return $this->image_sorce;
    }
    function setMiles($new_miles) {
        $this->miles = $new_miles;
    }
    function setModel($new_model) {
        $this->make_model = (string) $new_model;
    }
    function setPrice($new_price) {
        $this->price = $new_price;
    }
    function setImage($new_image_sorce) {
        $this->image_sorce = $new_image_sorce;
    }




}


$porsche = new Car();
$porsche->setModel("2014 Porsche 911");
$porsche->setPrice(114991);
$porsche->setMiles(7864);
$porsche->setImage("http://www.dan-dare.org/Dan%20FRD/CompactPussycatAni.gif");

$ford = new Car();
$ford->setModel("2011 Ford F450");
$ford->setPrice(55995);
$ford->setMiles(14241);
$ford->setImage("http://www.dan-dare.org/Dan%20FRD/BoulderMobileAni.gif");

$lexus = new Car();
$lexus->setModel("2013 Lexus RX350");
$lexus->setPrice(44700);
$lexus->setMiles(20000);
$lexus->setImage("https://media.giphy.com/media/pfeT03JnVSsbC/giphy.gif");

$mercedes = new Car();
$mercedes->setModel("Mercedes Benz CLS550");
$mercedes->setPrice(39900);
$mercedes->setMiles(37979);
$mercedes->setImage("https://media.tenor.co/images/f6d79c795f0c4961a9aa91d9ee5db2d3/raw");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"]) && $car->maxMiles($_GET["miles"])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
    <link rel="stylesheet" href="css/car-styles.css" type="text/css">
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
        if (count($cars_matching_search) == 0) {
            echo "<p>Stop being so picky</p>";
        } else {
          foreach ($cars_matching_search as $car) {
            echo  '<img src="'.$car->getImage(). '"/>';
            echo "<li> " . $car->getModel() . "</li>";
            echo "<ul>";
            echo "<li> $".$car->getPrice() . "</li>";
            echo "<li> Miles: ".$car->getMiles() . "</li>";
            echo "<li> Taxes and fees: $".$car->getHandlerFee() . "</li>";
            echo "</ul>";
          }
        }
        ?>
    </ul>
</body>
</html>
