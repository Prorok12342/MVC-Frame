<?php
/**
 * Description of NewsController
 *
 * @author BUIMOV ANDREY
 */

//------------------------------------------------------------------------------

class NewsController {
    public function actionAll(){
        $items = News::getAll();
        
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }
    
    public function actionOne(){
        $id = intval($_GET['id']);
        $item = News::getOne($id);
        
        $view = new View();
        $view->id = $id;
        $view->item = $item;
        
        $view->display('news/one.php');
    }
    
    
    
    
    
    
}
