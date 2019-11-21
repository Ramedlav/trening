<?php

//namespace ;

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
        $name = $this->request->getPost('name');
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $type = 'user';
        $user = new Users();

        echo $name." ".$login." ".$email." ".$type." ".$password;

        $success = $user->save(
            [
                $name,
                $login,
                $password,
                $email,
                $type,
            ]
        );

        if($success){
        echo "you are signup";
    }else{
            echo "luks like you have the error:";
            $messages = $user->getMessages();
            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        $this->view->disable();
    }

}

