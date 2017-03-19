<?php

require_once  __DIR__ . '/../classes/View.php';
require_once __DIR__ . '/../models/NewsModel.php';
require_once __DIR__ . '/../classes/DB.php';

class NewsController
{
    public function actionAll()
    {
       var_dump(
           NewsModel::findAll()
       );
//        $news = News::getAll();
//        $view = new View();
//        $view->items = $news;
//        $view->display('news/all.php');
//        iterator example
//        foreach ($view as $a => $b) {
//            print "$a: $b\n";
//        }
    }
    
    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        $view->assign('item', $item);
        $view->display('news/one.php');
    }
}