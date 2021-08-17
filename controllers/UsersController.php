<?php

require_once './models/DbManager.php';
require_once './views/View.php';

class UsersController
{
    private $dbManager;
    private $view;

    public function __construct()
    {
        $this->dbManager = new DbManager();
        $this->view = new View();
    }

    public function getAllAction()
    {
        $users = $this->dbManager->Users->getAll();
        $this->view->render("main", "users/getAll", $users);
    }

    public function getByIdAction($id)
    {
        $user = $this->dbManager->Users->getById($id);
        $this->view->render("main", "users/getById", $user);
    }

    public function signinAction()
    {
        $this->view->render("sign", "users/signin");
    }

    public function signupAction()
    {
        $this->view->render("sign", "users/signup");
    }

    public function authAction($post)
    {
        $login = $post["login"];
        $password = $post["password"];
        $user = $this->dbManager->Users->auth($login, $password);

        if ($user != null) {
            $this->view->redirect("links/getall");

        } else {
            $this->view->redirect("users/signin");
        }
    }

    public function addNewAction($post)
    {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if (!empty($name) && !empty($login) && !empty($password1) && !empty($password2)) {
            if ($password1 == $password2) {
                $user = $this->dbManager->Users->addNew($login, $password1, $name);
                if ($user != null) {
                    $links = $this->dbManager->Links->getAll($_SESSION['user_id']);
                    $this->view->redirect("links/getAll");
                } else {
                    $this->view->redirect("users/signup");
                }
            } else {
                $this->view->redirect("users/signup");
            }
        } else {
            $this->view->redirect("users/signup");
        }
    }

    public function editAction($post)
    {
        $id = $_SESSION['user_id'];
        if ($id == null) {
            $this->view->redirect("users/signin");
        } else {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            if (!empty($name) && !empty($login)) {
                if ($password1 == $password2) {
                    $this->dbManager->Users->edit($id, $login, $password1, $password2, $name);
                    $this->view->redirect("pages/personal");
                } else {
                    $this->view->redirect("pages/personal");
                }
            } else {
                $this->view->redirect("pages/personal");
            }
        }
    }

    public function logOutAction()
    {
        session_destroy();
        $this->view->redirect("users/signin");
    }

}
