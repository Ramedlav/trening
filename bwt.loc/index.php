<?php
require 'application/lib/Dev.php';
use \application\core\Router;

//функцыя срабатывает всегда переда выводом ошибки об отсутствии
//подключения к классу
spl_autoload_register(function ($class){
    //заменяем обратные слэши
    $path = str_ireplace('\\' , '/' , $class.'.php');
    if (file_exists($path)){
        require $path;
    }
});

session_start();
$new = new Router();
$new->run();
