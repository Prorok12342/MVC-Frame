<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author BUIMOV ANDREY
 */
class DB {
    
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
}


}
