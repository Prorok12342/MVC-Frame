<?php
/**
 * Description of NewsController
 *
 * @author BUIMOV ANDREY
 */
require_once __DIR__ . '/../models/News.php';

//------------------------------------------------------------------------------

class NewsController {
    public function actionAll(){
        $items = News::getAll();
        include __DIR__ . '/../views/news/all.php';
    }
    
    public function actionOne(){
        $id = intval($_GET['id']);
        $item = News::getOne($id);
        include __DIR__ . '/../views/news/one.php';
    }
    
    
    
    
    
    
}
