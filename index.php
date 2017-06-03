<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ . '/autoload.php';

// -----------------------------------------------------------------------------
//> Преобразование адресов
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);
//<

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';
$idArt = !empty($pathParts[3]) ? $pathParts[3] : $_GET['id'];

$_GET['id'] = $idArt;

try{
    $controllerClassName = $ctrl . 'Controller';

    $controller = new $controllerClassName;
    $method = 'action' . $act;

    $controller->$method();
} catch (ModelException $err){
    die('Чё-то не вышло...' . $err->getMessage());
}