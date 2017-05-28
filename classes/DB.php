<?php

/**
 * Description of DB
 *
 * @author BUIMOV ANDREY
 */

class DB {
    protected $db;

    public function __construct(){
    $db_location = "localhost";
    $db_name = "testFrame";
    $db_user = "root";
    $db_password = "";
    
    // Соединение с базой данных.
    $db = mysqli_connect($db_location, $db_user, $db_password, $db_name);

    // Установка кодировки по умолчанию для соединения.
    mysqli_query($db, "SET NAMES utf8");    
    
    // Проверка ошибок подключения к базе даннных.
    if($db->connect_errno){
        echo "Ошибка доступа к базе данных";
        exit();
    }
    
    $this->db = $db;
}

/**
 * Функция для отправки всех запросов в базу данных.
 * 
 * @param type $sql - Запрос к базе.
 */
public function queryAll($sql, $class = 'stdClass'){
    $res = mysqli_query($this->db, $sql);
    if($res === FALSE){
        return FALSE;
    }
    
    while ($row = mysqli_fetch_object($res, $class)){
        $ret[] = $row;
    }
    return $ret;
}

public function queryOne($sql, $class = 'stdClass'){
    return $this->queryAll($sql, $class)[0];
}




}
