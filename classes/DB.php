<?php

/**
 * Description of DB
 *
 * @author BUIMOV ANDREY
 */

class DB {
    private $dbh;
    private $className = 'stdClass';

    public function __construct(){
        $db_location = "localhost";
        $db_name = "testFrame";
        $db_user = "root";
        $db_password = "";       

        $dsn = "mysql:dbname=$db_name;host=$db_location";
        $this->dbh = new PDO($dsn, $db_user, $db_password);    
    }
    
    public function setClassName($className){
        $this->className = $className;
    }

    public function query($sql, $params=[]){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }
    
    public function execute($sql, $params=[]){
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}