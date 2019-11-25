<?php
class MenuController extends  \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $category = Categories::findFirst();//$this->modelsManager->executeQuery('Select * FROM categories');

        $this->request->isPost('categories' = 'werefi');//$category->name);
    }



}

