<?php

/**
 * App\Models\User => ./App/Models/User.php
 */


spl_autoload_register(function ($class) {
    // Получаем путь к файлу из имени класса
    $path = __DIR__ . '/' .str_replace('\\', '/', $class) . '.php';
    // Если в текущей папке есть такой файл, то выполняем код из него
    if (file_exists($path)) {
        include $path;
    }

});