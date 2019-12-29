<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$ctrl = $_GET['ctrl'] ?: 'Tasks';
$controllerClassName = '\App\Controllers\\' . $ctrl;


$controller = new $controllerClassName;


$action = $_GET['action'] ?: 'Index';


try {
    $controller->action($action);
} catch (\App\Exceptions\Core $exception) {
    echo $exception->getMessage();
} catch (\App\Exceptions\Db $exception) {
    echo $exception->getMessage();
}

