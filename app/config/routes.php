<?php

use \Phalcon\Mvc\Micro\Collection as MicroCollection;

$routes = [];

//Posts
$posts = new MicroCollection();
$posts->setHandler(new PostsController()); // Set the main handler. ie. a controller instance
$posts->get('/posts', 'index');
$posts->get('/posts/show/{slug}', 'show');


$routes[] = $posts;

return $routes;