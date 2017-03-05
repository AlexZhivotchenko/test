<?php

class DB
{
    public $con;
    public function  __construct()
    {
        return $this->con = new PDO('mysql:host=127.0.0.1;dbname=userlistdb', 'root', '');
    }
    public function query($sql, $class = 'stdClass')
    {
        $res = ($this->con)->query($sql);
        if (false === $sql)
        {
            return false;
        }
        $ris = [];
        while ($row = $res->fetchObject($class))
        {
            $ris[] = $row;
        }
        return $ris;
    }
}