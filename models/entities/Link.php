<?php


class Link
{
    public $Id;
    public $UserId;
    public $Name;
    public $About;
    public $Url;
    public $Date;
    public $Visibility;

    /**
     * Link constructor.
     * @param $Id
     * @param $UserId
     * @param $Name
     * @param $About
     * @param $Url
     * @param $Date
     * @param $Visibility
     */
    public function __construct($Id, $UserId, $Name, $About, $Url, $Date, $Visibility)
    {
        $this->Id = $Id;
        $this->UserId = $UserId;
        $this->Name = $Name;
        $this->About = $About;
        $this->Url = $Url;
        $this->Date = $Date;
        $this->Visibility = $Visibility;
    }
}