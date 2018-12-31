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

$app->get('/create', \ToDoController::class . ':create');

$app->get('/edit/{id}', \ToDoController::class . ':edit');

$app->post('/add', \ToDoController::class . ':add');


