<?php

include_once ("view.php");
include_once ("Models/reservas.php");
include_once ("Models/TimeSlots.php");


Class reservasController{

    
    private $reservas,$view,$timeslots;

    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->reservas = new reservas(); // Modelo de usuarios
        $this->timeslots = new TimeSlots(); 
    }


    public function mostrarFormulario(){

       

        $data['Lunes'] = $this->timeslots->obtenerHorario("Lunes");

        
        
       

        $this->view->show("crearReservas", $data);
    }

    public function insertarReserva(){
        if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["realname"])){
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $realname = $_REQUEST["realname"];

            $this->users->insertarReserva($username,$password,$realname);
            header("Location: index.php?controller=usersController&action=list");
            
            
    }
}

}