<?php

class User{
    public $Id;
    public $Name;
    public $Login;
    public $Password;

    /**
     * User constructor.
     * @param $Id
     * @param $Name
     * @param $Login
     * @param $Password
     */
    public function __construct($Id, $Name, $Login, $Password)
    {
        $this->Id = $Id;
        $this->Name = $Name;
        $this->Login = $Login;
        $this->Password = $Password;
    }

}