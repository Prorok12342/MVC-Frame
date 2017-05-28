<?php

/**
 * Description of News
 *
 * @author BUIMOV ANDREY
 */

require_once __DIR__ . '/../classes/DB.php';

//------------------------------------------------------------------------------

class News {
    public $id;
    public $title;
    public $text;
    
    public static function getAll(){
        $db = new DB;
        return $db->queryAll('SELECT * FROM news', 'News');
    }
    
    public static function getOne($id){
        $id = intval($id);
        
        $db = new DB();
        return $db->queryOne('SELECT * FROM `news` WHERE `id`=' . $id, 'News');
    }
    
}
