<?php

//namespace ;

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new Users();

        $success = $user->save(
            $this->request->getPost(),
            [
                "login",
                "name",
                "password",
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

