<?php


class DbConnector
{
    public static function getConnection(): mysqli
    {
        $mysqli = new mysqli("localhost", "root", "root", "secondsite.loc");

        $mysqli->set_charset("utf8_general_ci");

        return $mysqli;
    }
}