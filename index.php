<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$ctrl = $_GET['ctrl'] ?: 'News';
$controllerClassName = '\App\Controllers\\' . $ctrl;
$controller = new $controllerClassName;


$action = $_GET['action'] ?: 'Index';


try {
    $controller->action($action);
} catch (\App\Exceptions\Core $e) {
    echo 'Возникло исключение приложения: ' . $e->getMessage();
} catch (PDOException $e) {
  echo 'Что-то не так с базой';
}

