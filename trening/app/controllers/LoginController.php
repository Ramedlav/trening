<?php
class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function loginAction()
    {
        $login=$this->request->getPost('login');
        $password=$this->request->getPost('password');


        $user = Users::findFirst(["login = '".$login."'"]);

        if ($user->password == $password){
//            $this->request->redirect('profile');
            echo 'you in';
        }
    }

}

