<?php

include_once ("view.php");
include_once ("Models/reservas.php");
include_once ("Models/TimeSlots.php");
include_once ("Models/Resources.php");
include_once ("Models/users.php");




Class reservasController{

    
    private $reservas,$view,$timeslots;

    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->reservas = new reservas(); // Modelo de usuarios
        $this->timeslots = new TimeSlots();
        $this->resources = new Resources();
        $this->users = new Users();  
    }


    public function mostrarFormulario(){
        $data['recursos'] = $this->resources->resourceslist();
        $data['Lunes'] = $this->timeslots->obtenerHorario("Lunes");
        $this->view->show("crearReservas", $data);
    }

    public function mostrarFormulario2(){
        
        $data['idRecurso'] = $_REQUEST['idRecurso'];
        $idRecurso =  $data['idRecurso'];

        $fecha = $_REQUEST['fecha'];
        $data['fechaRaw'] = $fecha;

        $dias = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabado');
        $data['fecha'] = $dias[date('N', strtotime($fecha))];
        $fecha = $data['fecha'];

        //SEGUIR AQUI

        $data['timeslots'] = $this->timeslots->obtenerHorario($fecha);
        
        $data['recurso'] = $this->resources->encontrar($idRecurso);
        
        $data['usuario'] = $this->users->usuarioLogueado();


        $this->view->show("crearReservas2", $data);
    }


    public function crearReserva(){
        $result = $this->reservas->crearReserva();

        if($result>0){
            echo "OK";
        }else{
            echo "ERROR";
        }
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