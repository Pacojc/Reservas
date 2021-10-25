<?php
include_once("ResourcesController.php");
include_once("TimeSlotsController.php");
include_once("usersController.php");
include_once("menuController.php");


session_start();

if (!isset($_REQUEST['action'])) {

    $action = "list";
} else {

    $action = $_REQUEST['action'];
}

if (!isset($_REQUEST['controller'])) {

    $controller = "menuController";
} else {

    $controller = $_REQUEST['controller'];
}
$controller = new $controller();

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}else{
    $id = null;
}

$controller->$action($id);