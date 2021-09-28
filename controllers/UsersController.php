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

    #region methods
    public function isNotHtml($string)
    {
        return preg_match("/<[^<]+>/", $string, $m) == 0;
    }

    public function isAutorized(): bool
    {
        $id = $_SESSION['user_id'];
        if ($id == null) {
            $id = $_COOKIE["user_id"];
            if ($id == null) {
                return false;
            } else {
                $_SESSION['user_id'] = $_COOKIE["user_id"];
                return true;
            }
        } else {
            return true;
        }
    }

    public function sendEmail($email, $name)
    {
        $code = substr(md5(uniqid(rand(), true)), 24, 8);

        $to = $email;
        $subject = "Welcome!";
        //$message = 'hello';
        $message = "
<html>
<head>
  <title>Successful registration</title>
</head>
<body>
  <p2>{$name}, thank you for registering on linkswarehouse.xyz</p2>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';


//        $headers[] = 'To: Roman <romm858@mail.ru>';
        $headers[] = 'From: LinksWarehouse <birthday@example.com>';
        $headers[] = 'Cc: birthdayarchive@example.com';
        $headers[] = 'Bcc: birthdaycheck@example.com';
//        $headers = 'From: romm858@mail.ru' . "\r\n" .
//            'Reply-To: romm858@mail.ru' . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();

//        mail($to, $subject, $message, $headers);
        mail($to, $subject, $message, implode("\r\n", $headers));
    }
    #endregion

    #region GET
    public function getByIdAction($id)
    {
        $user = $this->dbManager->Users->getById($id);
        $this->view->render("main", "users/getById", $user);
    }

    public function signinAction()
    {
        if ($this->isAutorized()) {
            $this->view->redirect("links/getall");
        } else {
            $this->view->render("sign", "users/signin");
        }
    }

    public function signupAction()
    {
        if ($this->isAutorized()) {
            $this->view->redirect("links/getall");
        } else {
            $this->view->render("sign", "users/signup");
        }
    }

    public function authAction($post)
    {
        $login = $post["login"];
        $password = $post["password"];
        $user = $this->dbManager->Users->auth($login, $password);
        $remember = $post["remember"];

        if ($user != null) {
            if ($remember == true) {
                setcookie("user_id", $_SESSION['user_id'], time() + (1000 * 60 * 60 * 24 * 30));
            }
            $this->view->redirect("links/getall");
        } else {
            $this->view->redirect("users/signin");
        }
    }
    #endregion

    #region POST
    public function addNewAction($post)
    {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($this->isNotHtml($name) && $this->isNotHtml($login) && $this->isNotHtml($password1)) {
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
        } else {
            $this->view->redirect("users/signup");
        }
    }
    #endregion

    #region PUT
    public function editAction($post)
    {
        $id = $_SESSION['user_id'];
        if ($this->isAutorized()) {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            if ($this->isNotHtml($name) && $this->isNotHtml($login) && $this->isNotHtml($password1)) {
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
            } else {
                $this->view->redirect("pages/personal");
            }
        } else {
            $this->view->redirect("users/signin");
        }
    }
    #endregion

    public function logOutAction()
    {
        $_SESSION = array();
        setcookie("user_id", null, time() - 3600);
        $this->view->redirect("users/signin");
    }

}
