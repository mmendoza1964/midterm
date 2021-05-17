<?php

//Controller for the midterm project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define routes
$f3->route('GET /', function () {
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey', function ($f3) {

    $f3->set('choices', getOptions());

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $_SESSION['name'] = $_POST['name']; //save name input to session
        $_SESSION['choices'] = $_POST['choices[]']; //save chosenChoices to session

        //check to see if choices is empty

        header('location: summary');
    }

    //Display the order1 page
    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('GET|POST /summary', function ($f3) {
    echo "var_dump($_SESSION)";

    //Display the order1 page
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();

