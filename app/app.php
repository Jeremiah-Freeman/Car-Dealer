<?php

    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    session_start();

    if(empty($_SESSION['list_of_cars'])) {
      $_SESSION['list_of_cars'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    $app->get("/", function() use ($app) {
    return $app['twig']->render('create_car_form.html.twig', array('create_car' => Car::getAll()));
    });

    $app->post("/car-input" , function() use ($app) {
      $display_new_car = new Car($_POST["price"] , $_POST["miles"] , $_POST["make"] , $_POST["URL"]);
      $display_new_car->save();
      return $app["twig"]->render("display_created_car.html.twig" , array('display_car' => $display_new_car));
    });
    $app->post("/clear-listings" , function() use ($app) {
      Car::deleteListings();
      return $app['twig']->render('create_car_form.html.twig', array('create_car' => Car::getAll()));
    });





    return $app;
?>
