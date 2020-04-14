<?php

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];


    public function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key=>$val){
            $this->add($key,$val);// из файла routes.php отправляем все роуты в метод add
        }
    }

    public function add($route,$params){
        $route = '#^'.$route.'$#';  //делаем из имени роута регулярное выражение
        $this->routes[$route] = $params; //записываем роуты с именами в виде рег.выр. в защищенную routs
    }

    public function match(){ //метод проверки маршрута
        $url = trim($_SERVER['REQUEST_URI'] , '/'); //текущий адрес без "/" в начале
        foreach ($this->routes as $route => $params) {

            if(preg_match($route , $url , $mathes)){
//                выполняем проверку на соответствие
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
    if($this->match()){ // выполнится если preg_match сработает и вернет true
        //формируем путь к контроллеру
        $path = 'application\controllers\\'. ucfirst($this->params['controller'].'Controller');
        //выполняем проверку на существование контроллера
        if(class_exists($path)){
            $action = $this->params['action'].'Action';
            //выполняем проверку на существование метода
            if(method_exists($path,$action)){
                //если проверки прошли создаем экземпляр контроллера и вызываем нужный метод
                $controller = new $path($this->params);
                $controller->$action();
            }else{
                echo "ОШИБКА: метод не найден ".$action;
            }
        }else{
            echo "ОШИБКА: контроллер не найден ".$path;
        }

    }else{
        echo "маршрут не найден";
    }
    }


}