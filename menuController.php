<?php
include_once ("view.php");
include_once ("Models/security.php");
include_once ("Models/users.php");

class MenuController{

    private $view;
    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->users = new users();
        if(Security::thereIsSession()==false){
            header("Location: index.php?controller=usersController&action=login");
        }
    }


    public function list(){


        if(Security::thereIsSession()){
            $data['userLogueado'] = $this->users->usuarioLogueado();
        }else{
            $data = null;
        }
        
        
        $this->view->show("menuList", $data);
    }
}