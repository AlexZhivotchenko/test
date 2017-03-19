<?php

require_once  __DIR__ . '/IModel.php';
require_once __DIR__ . '/DB.php';

abstract class AbstractModel
{
    static protected $table;

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPc($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        return $db->query($sql, [':id' => $id]);
    }
}