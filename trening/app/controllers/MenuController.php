<?php
class MenuController extends  \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
//        $category = Categories::findFirst();//$this->modelsManager->executeQuery('Select * FROM categories');
        $di = new Phalcon\Di\;
        $categories = 'werefi';
        $di->getShared($categories);
//        $this->view->setVar('categories', 'werefi');//$category->name);
    }



}

