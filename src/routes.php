<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

/*
$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
*/


/*
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
*/


$app->get('/home', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $response->getBody()->write("Hello, Word");
    $todo = new ToDo();
    // Render index view
   //return $this->renderer->render($response, 'index.phtml', $args);
    return $response;
});

$app->get('/', \ToDoController::class . ':home');

$app->get('/login', \ToDoController::class . ':login');

$app->post('/authenticateUser', \ToDoController::class . ':authenticateUser');

$app->get('/create', \ToDoController::class . ':create');

$app->get('/view/{id}', \ToDoController::class . ':view');

$app->get('/edit/{id}', \ToDoController::class . ':edit');

$app->post('/update/{id}', \ToDoController::class . ':update');

$app->post('/add', \ToDoController::class . ':add');

$app->post('/quickAdd', \ToDoController::class . ':quickAdd');

$app->post('/delete', \ToDoController::class . ':delete');

