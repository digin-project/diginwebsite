<?php
    require 'vendor/autoload.php';
    require 'data/projects.php';

    $app = new \Slim\Slim(array(
        'templates.path' => './views'
    ));

    $app->get('/', function () use ($app) {
        $app->render('home.php');
    });

    $app->get('/projet/:project', function($project) use ($app) {
        try {
            $data = Data::$__projects[$project];
            $app->render('project.php', $data);
        } catch(Exception $e) {
            echo $e;
        }
    });


    $app->run();
