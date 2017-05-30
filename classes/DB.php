<?php

/**
 * Description of DB
 *
 * @author BUIMOV ANDREY
 */

class DB {
    private $dbh;

    public function __construct(){
        $db_location = "localhost";
        $db_name = "testFrame";
        $db_user = "root";
        $db_password = "";       

        $dsn = "mysql:dbname=$db_name;host=$db_location";
        $this->dbh = new PDO($dsn, $db_user, $db_password);    
    }

    public function query($sql, $params=[]){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}