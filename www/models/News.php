<?php

require_once  __DIR__ . '/../classes/DB.php';
require_once  __DIR__ . '/../classes/AbstractModel.php';

class News extends AbstractModel
{
    public $id;
    public $name;
    public $text;

    protected static $table = 'news';
    protected static $class = 'News';


}