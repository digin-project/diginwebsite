<?php

require 'vendor/autoload.php';
require 'data/class.data.php';
require 'config/database.php';
require 'models/user.model.php';

$app = new \Slim\Slim(array(
    'templates.path' => './views'
));

$app->get('/', function () use ($app) {
    $app->render('home.php');
});

$app->get('/lab', function() use ($app) {
    $app->render('lab.php');
});

$app->get('/mentions-legales', function() use ($app) {
	$app->render('mentions-legales.php');
});

$app->get('/test', function() {
    // $book = new \User(array(
    //     'username' => 'Sahara',
    //     'password' => 'Clive Cussler'
    // ));
    // $book->save();
    // echo $book->toJson();
    $books = \User::all();
    echo $books->toJson();
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
