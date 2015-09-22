<?php
session_cache_limiter(false);
session_start();

require 'vendor/autoload.php';
require 'data/class.data.php';
require 'config/database.php';
require 'models/user.model.php';
require 'helpers/class.session.php';

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

/** Protected area **/

$app->get('/private/', function() use ($app) {
    if(Session::hasUser()) {
        $app->redirect('/private/login');
    } else {
        $app->render('private.php');
    }
});

/** Users manager **/

$app->get('/private/users', function() use ($app) {
    if(!Session::hasUser()) {
        if(Session::getUser()["admin"]) {
            $users = \User::all();
            $app->render('users.php', array('users' => $users));
        } else {
            $app->redirect('/private/');
        }
    } else {
        $app->redirect('/private/');
    }
});

/** Login **/

$app->get('/private/login', function() use ($app) {
    $app->render('login.php');
});

$app->post('/private/login', function() use ($app) {
    $data = $app->request->post();
    $user = \User::findUser($data["username"], $data["password"]);
    if($user) {
        Session::setUser($user);
        $app->redirect('/private/');
    } else {
        $app->flash('error', 'Problème lors de la connexion.');
        $app->render('login.php', array('error' => 'Problème lors de la connexion.'));
    }
});

/** Logout **/

$app->get('/private/logout', function() use ($app) {
    Session::clearUser();
    $app->redirect('/private/login');
});

$app->run();
