<?php

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function  __construct()
    {
         $this->dbh = new PDO('mysql:host=127.0.0.1;dbname=userlistdb', 'root', '');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params= [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params= [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
    }



//    public function queryAll($sql, $class = 'stdClass')
//    {
//        $res = ($this->con)->query($sql);
//        if (false === $sql)
//        {
//            return false;
//        }
//        $ris = [];
//        while ($row = $res->fetchObject($class))
//        {
//            $ris[] = $row;
//        }
//        return $ris;
//    }
//
//    public function queryOne($sql, $class = 'stdClass')
//    {
//        return $this->queryAll($sql, $class)[0];
//    }
}