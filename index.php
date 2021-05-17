<?php

//Controller for the midterm project

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define routes
$f3->route('GET /', function () {
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey', function () {

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['choices'] = $_POST['choices[]'];

        //check to see if choices is empty

        header('location: summary');
    }

    //Display the order1 page
    $view = new Template();
    echo $view->render('views/survey.html');
});

//Run Fat-Free
$f3->run();

