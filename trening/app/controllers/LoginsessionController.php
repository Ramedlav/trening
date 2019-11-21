<?php

//namespace ;

class LoginsessionController extends  \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function profileAction()
    {
        $this->view->('profile/index');
    }

}

