<?php
echo
 class ModelSQL {
     public $con;
     public function  __construct()
     {
         return $this->con = new PDO('mysql:host=127.0.0.1;dbname=userlistdb', 'root', '');
     }
     public function addNewPost($nameTable, $value) {

         $sql = ($this->con)->prepare('INSERT INTO '.$nameTable.' (nameCountry) VALUES (?)');
         var_dump($sql);
         return $sql->execute(array($value));

     }
     public function updatePost($nameTable, $valueSET, $valueLike) {

         $sql1 = ($this->con)->prepare('UPDATE '.$nameTable.'  SET email = ?  WHERE nameCountry LIKE ?');
         return $sql1->execute(array($valueSET, $valueLike));

     }
 }
 $value1 = new ModelSQL();
 $value1->addNewPost('country', 'USSR');
 $value1->updatePost('usertbl', 'mis@mail.ru', 'Belgium');
