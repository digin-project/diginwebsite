<?php
    require 'vendor/autoload.php';

    $app = new \Slim\Slim(array(
        'templates.path' => './views'
    ));

    $app->get('/', function () use ($app) {
        $app->render('home.php');
    });


    $app->run();