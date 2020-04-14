<?php

namespace application\core;

class View {
    public $path;
    public $route;
    public $layout = 'default';


    public function __construct($route){
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []){
        extract($vars);//распаковываем массив на переменные
        if (file_exists('application/views/'.$this->path.'.php')){
            ob_start();//начало буфиризации контента
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();//конец буфиризации
            require 'application/views/layouts/'.$this->layout.'.php';
        }else{
            echo "файл не найден ".$this->path;
        }
    }
}