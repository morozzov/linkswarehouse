<?php

require_once './models/DbManager.php';
require_once './views/View.php';

session_start();

class PagesController
{
    private $dbManager;
    private $view;
    private $id;

    public function __construct()
    {
        $this->dbManager = new DbManager();
        $this->view = new View();
    }

    public function personalAction()
    {
        $id = $_SESSION['user_id'];

        if ($id == null) {
            $this->view->redirect("users/signin");
        } else {
            $user = $this->dbManager->Users->getById($id);
            $this->view->render("main", "pages/personal", $user);
        }
    }


}