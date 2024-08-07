<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$router = new Router();

$update = json_decode(file_get_contents("php://input"),true);

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($router->isApiCall()){
    if($requestMethod == 'GET'){
        if($router->getResourceId()){
            echo "Task " . $router->getResourceId();
        }
        echo "All Tasks";
    } 
    
    if($requestMethod == 'POST'){
        echo "New info";
    }

    if($requestMethod == 'PATCH'){
        echo "Resource : " . $router->getResourceId() . " updated!";
    }

}

if($router->isTelegramUpdate()){
    echo "Telegram";
}

echo "WEB";