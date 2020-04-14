<?php
namespace application\controllers;

use application\core\Controller;

class SupportController extends Controller {

    public function showAction(){
        $this->view->render("потдержка");
    }
}