<?php
session_start();
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

//define an animal type route
$f3->route('GET /order', function($f3, $params) {
    //echo '<h1>My pets</h1>';
    //echo "<a href='order'>Order a pet</a>";
    //$view = new View;
    //echo $view->render('views/home.html');

    switch ($params['order'])
    {
        case 'shark':
            $sound = " nom nom"; break;

        case 'dog':
            $sound = " ruff ruff"; break;

        case 'cat':
            $sound = " meow"; break;

        case 'wolf':
            $sound = " aoooooo"; break;

        case 'lion':
            $sound = " roar"; break;

        default:
            $f3->error(404);
    }
});

//define a route for order
$f3->route('GET /order', function() {
    $view = new View;
    echo $view->render('views/form1.html');
});

//define a route for order
$f3->route('POST /order2', function() {
    $_SESSION["animal"]= $_POST['animal'];
    $view = new View;
    echo $view->render('views/form2.html');
});

//define a route for order
$f3->route('POST /results', function() {
    $_SESSION["color"]= $_POST['color'];
    $template = new Template();
    echo $template->render('views/results.html');
});

//Run fat free
$f3->run();