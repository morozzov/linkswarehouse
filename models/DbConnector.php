<?php


class DbConnector
{
    public static function getConnection(): mysqli
    {
        $mysqli = new mysqli("localhost", "root", "root", "linkswarehouse", 8889);

        $mysqli->set_charset("utf8_general_ci");

        return $mysqli;
    }
}