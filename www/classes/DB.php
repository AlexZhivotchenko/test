<?php

class DB
{
    public $con;
    public function  __construct()
    {
        return $this->con = new PDO('mysql:host=127.0.0.1;dbname=userlistdb', 'root', '');
    }
    public function queryAll($sql, $class = 'stdClass')
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

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }
}