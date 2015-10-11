<?php

// Simple database connection to localhost
$di->set('mongo', function () {
    $mongo = new MongoClient();
    return $mongo->selectDB('phalcon');
}, true);

$di->set('collectionManager', function(){
    return new Phalcon\Mvc\Collection\Manager();
}, true);