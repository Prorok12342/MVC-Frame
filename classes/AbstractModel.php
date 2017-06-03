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
    
    protected $data = [];
    
    public function __set($k, $v){
        $this->data[$k] = $v;
    }
    
    public function __get($k){
        return $this->data[$k];
    }

    public static function getAll(){
        $db = new DB;
        
        $class = get_called_class();
        $sql = 'SELECT * FROM `' . static::$table . '`';
        $db->setClassName($class);
        $res = $db->query($sql);
        
        return $res;
    }
    
    public static function getOne($id){
        $id = intval($id);
        
        $class = get_called_class();
        $db = new DB();        
        $sql = 'SELECT * FROM `' . static::$table . '` WHERE id=:id';
        $db->setClassName($class);
        $res = $db->query($sql, [':id' => $id])[0];
        
        if(empty($res)){
            throw new ModelException('Статья не существует.');
        }
        
        return $res;
    }
    
    public function insert(){
        $cols  = array_keys($this->data);
        $data = [];
        foreach ($cols as $i){
            $data[':' . $i] = $this->data[$i];
        }
        $sql = 'INSERT INTO ' . static::$table . '
                (' . implode(', ', $cols) . ')
                 VALUES (' . implode(', ', array_keys($data)) . ')';
        
        $db = new DB();
        $db->execute($sql, $data);
    }
}
