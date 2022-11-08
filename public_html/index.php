<?php
require '../src/routes/routes.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Max-Age: *');
header('Content-Type: application/json;charset=utf-8');

$URI = $_SERVER['REQUEST_URI'];
$httpMethod = $_SERVER['REQUEST_METHOD'];


$explodedURI = array_slice(explode('/', $URI), 2);


try{
    $router->routeHandler($explodedURI, $httpMethod);
}catch(Exception $e){
    http_response_code(500);
    echo 'An error has occuried';
}