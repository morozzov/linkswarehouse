<?php

require_once './models/entities/Link.php';
require_once './models/DbConnector.php';

class TableLinks
{
    public function getAll($id): array
    {
        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `links` WHERE `userId` = {$id} OR `visibility` = 1");

        $links = array();
        while ($row = $queryResult->fetch_assoc()) {
            $link = new Link(
                $row["id"],
                $row["userId"],
                $row["name"],
                $row["about"],
                $row["url"],
                $row["date"],
                $row["visibility"]
            );

            array_push($links, $link);
        }

        return $links;
    }

    public function getBySearch($id, $query): array
    {
        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `links` WHERE (`userId` = {$id} OR `visibility` = 1) AND (`name` LIKE '%{$query}%' OR `about` LIKE '%{$query}%')");

        $links = array();
        while ($row = $queryResult->fetch_assoc()) {
            $link = new Link(
                $row["id"],
                $row["userId"],
                $row["name"],
                $row["about"],
                $row["url"],
                $row["date"],
                $row["visibility"]
            );

            array_push($links, $link);
        }

        return $links;
    }

    public function deleteById($id)
    {
        $db = DbConnector::getConnection();

        $db->query("DELETE FROM `links` WHERE `id` = {$id}");
    }

    public function getByUserId($id)
    {
        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `links` WHERE `userId` = {$id}");

        $links = array();
        while ($row = $queryResult->fetch_assoc()) {
            $link = new Link(
                $row["id"],
                $row["userId"],
                $row["name"],
                $row["about"],
                $row["url"],
                $row["date"],
                $row["visibility"]
            );

            array_push($links, $link);
        }

        return $links;
    }

    public function getById($rowId)
    {
        $db = DbConnector::getConnection();

        $queryResult = $db->query("SELECT * FROM `links` WHERE `id` = {$rowId}");

        if ($queryResult->num_rows == 0) {
            throw new Exception("Link with id = {$rowId} not found");
        } else {
            $row = $queryResult->fetch_assoc();
            $link = new Link(
                $row["id"],
                $row["userId"],
                $row["name"],
                $row["about"],
                $row["url"],
                $row["date"],
                $row["visibility"]
            );

            return $link;
        }
    }

    public function addNew($userId, $name, $text, $url, $date, $visibility)
    {
        $db = DbConnector::getConnection();

        $db->query("INSERT INTO `links` (`id`, `userId`, `name`, `about`, `url`, `date`, `visibility`) VALUES (NULL, '{$userId}', '{$name}', '{$text}', '{$url}', '{$date}', '{$visibility}')");
    }

    public function edit($rowId, $userId, $name, $text, $url, $date, $visibility)
    {
        $db = DbConnector::getConnection();

        $db->query("UPDATE `links` SET `name` = '{$name}', `about` = '{$text}', `url` = '{$url}', `date` = '{$date}', `visibility` = '{$visibility}' WHERE `links`.`id` = '{$rowId}';");

    }
}