<?php
session_start();

require_once './models/DbManager.php';
require_once './views/View.php';

class LinksController
{
    private $dbManager;
    private $view;
    private $id;

    public function isNotHtml($string)
    {
        return preg_match("/<[^<]+>/", $string, $m) == 0;
    }

    public function __construct()
    {
        $this->dbManager = new DbManager();
        $this->view = new View();
    }

    public function getAllAction()
    {
        $id = $_SESSION['user_id'];
        if ($id == null) {
            $this->view->redirect("users/signin");
        } else {
            $links = $this->dbManager->Links->getAll($id);
            $this->view->render("main", "links/getAll", $links);
        }
    }

    public function getBySearchAction()
    {
        $query = $_POST['query'];;
        $id = $_SESSION['user_id'];

        if ($this->isNotHtml($query)) {
            if ($id == null) {
                $this->view->redirect("users/signin");
            } else {
                $links = $this->dbManager->Links->getBySearch($id, $query);
                $this->view->render("main", "links/getBySearch", $links);
            }
        } else {
            $this->view->redirect("links/getall");
        }
    }

    public function getByIdAction()
    {
        $id = $_SESSION['user_id'];
        if ($id == null) {
            $this->view->redirect("users/signin");
        } else {
            $links = $this->dbManager->Links->getByUserId($id);
            $this->view->render("main", "links/getById", $links);
        }
    }

    public function addFormAction()
    {
        $this->view->render("main", "links/add");
    }

    public function addNewAction()
    {
        $userId = $_SESSION['user_id'];
        $name = $_POST['name'];
        $text = $_POST['text'];
        $url = $_POST['url'];

        if ($this->isNotHtml($name) && $this->isNotHtml($text) && $this->isNotHtml($url)) {
            $visibility = $_POST['visibility'];
            if ($visibility == true) {
                $visibility = 1;
            } else {
                $visibility = 0;
            }
            $now = new DateTime();
            $date = $now->format('Y-m-d H:i:s');

            if ($name != "" && $url != "") {
                if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {

                    $this->dbManager->Links->addNew($userId, $name, $text, $url, $date, $visibility);

                    $this->view->redirect("links/getById");
                } else {
                    $this->view->redirect("links/addForm");
                }
            } else {
                $this->view->redirect("links/addForm");
            }
        } else {
            $this->view->redirect("links/addForm");
        }
    }

    public function editFormAction()
    {
        $rowId = $_POST['rowId'];

        $link = $this->dbManager->Links->getById($rowId);

        $this->view->render("main", "links/edit", $link);
    }

    public function editAction()
    {
        $rowId = $_POST['rowId'];
        $userId = $_SESSION['user_id'];
        $name = $_POST['name'];
        $text = $_POST['text'];
        $url = $_POST['url'];
        $visibility = $_POST['visibility'];

        if ($this->isNotHtml($name) && $this->isNotHtml($text) && $this->isNotHtml($url)) {
            if ($visibility == true) {
                $visibility = 1;
            } else {
                $visibility = 0;
            }
            $now = new DateTime();
            $date = $now->format('Y-m-d H:i:s');

            if ($name != "" && $url != "") {
                if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) {

                    $this->dbManager->Links->edit($rowId, $userId, $name, $text, $url, $date, $visibility);

                    $this->view->redirect("links/getById");
                } else {
                    $this->view->redirect("links/getById");
                }
            } else {
                $this->view->redirect("links/getById");
            }
        } else {
            $this->view->redirect("links/getById");
        }
    }

    public function deleteByIdAction($post)
    {
        $id = $post["id"];

        $this->dbManager->Links->deleteById($id);

        $this->view->redirect("links/getById");
    }


}