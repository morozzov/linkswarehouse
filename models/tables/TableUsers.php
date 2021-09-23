<?php
session_start();


require_once './models/entities/User.php';
require_once './models/DbConnector.php';

class TableUsers
{
    public function getById($id): User
    {
        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `users` WHERE `id` = {$id}");

        if ($queryResult->num_rows == 0) {
            throw new Exception("User with id = {$id} not found");
        } else {
            $row = $queryResult->fetch_assoc();
            $user = new User(
                $row["id"],
                $row["name"],
                $row["login"],
                $row["password"]
            );
            return $user;
        }
    }

    public function auth($login, $password)
    {
        $password = hash('sha512',$password);

        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `users` WHERE `login`='{$login}' AND `password`='{$password}'");

        if ($queryResult->num_rows == 0) {
            return null;
        } else {
            $row = $queryResult->fetch_assoc();
            $user = new User(
                $row["id"],
                $row["name"],
                $row["login"],
                $row["password"]
            );

            $_SESSION['user_id'] = $row["id"];
            return $user;
        }
    }

    public function addNew($login, $password, $name)
    {
        $password = hash('sha512',$password);

        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `users` WHERE login='{$login}'");

        if ($queryResult->num_rows == 0) {
            $db->query("INSERT INTO `users` (`id`, `login`, `password`, `name`) VALUES (NULL, '{$login}', '{$password}', '{$name}');");

            $queryResult = $db->query("SELECT * FROM `users` WHERE `login`='{$login}' AND `password`='{$password}'");

            $row = $queryResult->fetch_assoc();
            $user = new User(
                $row["id"],
                $row["name"],
                $row["login"],
                $row["password"]
            );
        } else {
            return null;
        }
        $_SESSION['user_id'] = $row["id"];
        return $user;
    }

    public function edit($id, $login, $password1, $password2, $name)
    {
        $db = DbConnector::getConnection();

        if ($password1 == $password2 and $password1 != "") {
            $password = hash('sha512',$password1);

            $db->query("UPDATE `users` SET `password` = '{$password}' WHERE `users`.`id` = '{$id}';");
        }

        $result = $db->query("SELECT * FROM `users` WHERE (login='{$login}')");

        $countRows = mysqli_num_rows($result);
        if ($countRows == 0) {
            $db->query("UPDATE `users` SET `login` = '{$login}' WHERE `users`.`id` = '{$id}';");
        }
        if ($name != "") {
            $db->query("UPDATE `users` SET `name` = '{$name}' WHERE `users`.`id` = '{$id}';");
        }
    }
}