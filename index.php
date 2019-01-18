<?php
//Turn on error reporting
ini_set('display_errors' , 1);
error_reporting(E_ALL);

//Require
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function() {
    echo '<h1>My pets</h1>';
    echo "<a href='order'>Order a pet</a>";
    //$view = new View;
    //echo $view->render('views/home.html');
});

//Run fat free
$f3->run();