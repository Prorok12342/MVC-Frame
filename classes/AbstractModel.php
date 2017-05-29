<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractModel
 *
 * @author BUIMOV ANDREY
 */
abstract class AbstractModel {
    
    protected static $table;
    protected static $class;

    public static function getAll(){
        $db = new DB;
        $sql = 'SELECT * FROM `' . static::$table . '`';
        
        return $db->queryAll($sql, static::$class);
    }
    
    public static function getOne($id){
        $id = intval($id);
        
        $db = new DB();        
        $sql = 'SELECT * FROM `' . static::$table . '` WHERE `id`=' . $id;
        
        return $db->queryOne($sql, static::$class);
    }
}
