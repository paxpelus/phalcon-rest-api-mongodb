<?php

use Phalcon\Mvc\Micro;

try {
    
    //Initialize Dependency Injection
    $di = new Phalcon\DI\FactoryDefault();

    //Initialize DB
    include_once(__DIR__ . '/app/config/database.php');
    
    
    //Register Directories
    $loader = new \Phalcon\Loader();
    
    $loader->registerDirs(
        array(
            __DIR__ . '/app/models/',
            __DIR__ . '/app/controllers/',
            __DIR__ . '/app/classes/'
        )
    )->register();
    
    
    //Create the app
    $app = new Micro();
    
    // Mount the routes
    $routes = include_once(__DIR__ . '/app/config/routes.php');
    foreach($routes as $route) {
        $app->mount($route);
    }
    
    
    // Default Response
    $app->get('/', function () {
        return Rs::p(1,'API is up!');
    });
    
    //Add any filter before running the route
    $app->before(function () use ($app) {
        //You may want to add some basic auth in order to access the REST API
    });
    
    //This is executed after running the route
    $app->after(function () use ($app) {
        
    });
  
    // Not Found
    $app->notFound(function () use ($app) {
        return Rs::p(0, 'Not Found', [], 404);
    });

    $app->handle();
    
} catch (\Exception $e) {
    
    return Rs::p(0, 'There was an error processing your request', $e->getMessage(), 400);
}