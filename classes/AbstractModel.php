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
abstract class AbstractModel implements IModel {
    
    protected static $table;
    protected static $class;

    public static function getAll(){
        $db = new DB;
        
        $sql = 'SELECT * FROM `' . static::$table . '`';
        $res = $db->query($sql);
        
        return $res;
    }
    
    public static function getOne($id){
        $id = intval($id);
        
        $db = new DB();        
        $sql = 'SELECT * FROM `' . static::$table . '` WHERE id=:id';
        $res = $db->query($sql, [':id' => $id]);
        
        return $res;
    }
}
