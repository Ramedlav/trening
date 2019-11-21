
<?php

use Phalcon\Di;
use Phalcon\Session\Adapter\Files as Session;
class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function exitAction()
    {
        $this->session->destroy();
        $this->view->pick('index/index');

    }


    public function loginAction()
    {

        $di = new Di();
        $login=$this->request->getPost('login');
        $password=$this->request->getPost('password');


        $user = Users::findFirst(["login = '".$login."'"]);

        if ($user->password == $password){
            $di->setShared(
                'session',
                function () {
                    $session = new Session();
                    $session->start();
                    return $session;
                }
            );
        $this->session->set('name', $user->name);
            $this->view->pick('profile/index');
        }
    }

}

