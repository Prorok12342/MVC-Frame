<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



// -----------------------------------------------------------------------------
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';

$controller = new $controllerClassName;
$method = 'action' . $act;

$controller->$method();