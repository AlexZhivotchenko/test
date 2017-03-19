<?php

require_once  __DIR__ . '/IModel.php';
require_once __DIR__ . '/DB.php';

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

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
        return $db->query($sql, [':id' => $id])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols  as $col) {
            $ins[] = ':' . $col;
            $data[':' . $col] = $this->data[$col];
        }
        $sql =
            'INSERT INTO ' . static::$table . '
             ('. implode(', ',$cols) .') 
             VALUES 
             ('. implode(', ',$ins) .')'
        ;
        $db = new DB();
        $db->execute($sql, $data);
    }
}