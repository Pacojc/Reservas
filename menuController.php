<?php
include_once ("view.php");

class MenuController{

    private $view;
    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
       
    }


    public function list(){
       
        $this->view->show("menuList");
    }
}