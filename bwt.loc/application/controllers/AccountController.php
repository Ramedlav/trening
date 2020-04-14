<?php
namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction(){
        $this->view->render("вход");
//        var_dump($this->route);
    }

    public function registerAction(){
        $this->view->render("регистрация");
    }
}