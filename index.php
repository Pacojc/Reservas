<?php
include_once("ResourcesController.php");


if (!isset($_REQUEST['action'])) {

    $action = "list";
} else {

    $action = $_REQUEST['action'];
}

if (!isset($_REQUEST['controller'])) {

    $controller = "ResourcesController";
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