<?php

require_once './models/tables/TableUsers.php';
require_once './models/tables/TableLinks.php';

class DbManager{
    public $Users;
    public $Links;

    public function __construct()
    {
        $this->Users = new TableUsers();
        $this->Links = new TableLinks();
    }
}