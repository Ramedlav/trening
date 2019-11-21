<?php

//namespace ;

class SessionController extends  \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function profileAction()
    {
        $this->view->('profile/index');
    }

}

