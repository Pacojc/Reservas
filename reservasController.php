<?php

include_once ("view.php");
include_once ("Models/reservas.php");
include_once ("Models/TimeSlots.php");
include_once ("Models/Resources.php");
include_once ("Models/users.php");
include_once ("Models/security.php");




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
        $data['seleccionado'] = $_REQUEST['id'];
        $data['recursos'] = $this->resources->resourceslist();
        $this->view->show("reservas/crearReservas", $data);
    }
    /**
     * En este metodo coge el dia que me pasa el usuario y lo convierte en dia de la semana.
     */
    public function mostrarFormulario2(){
        
        $data['idRecurso'] = $_REQUEST['idRecurso'];
        $idRecurso =  $data['idRecurso'];

        $fecha = $_REQUEST['fecha'];
        $data['fechaRaw'] = $fecha;

        $dias = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabado');
        $data['fecha'] = $dias[date('N', strtotime($fecha))];
        $fecha = $data['fecha'];

        $data['timeslots'] = $this->timeslots->obtenerHorario($fecha);
        
        $data['recurso'] = $this->resources->encontrar($idRecurso);
        
        $data['usuario'] = $this->users->usuarioLogueado();


        $this->view->show("reservas/crearReservas2", $data);
    }


    public function crearReserva(){
        $result = $this->reservas->crearReserva();

        if($result>0){
            header("Location: index.php?controller=reservasController&action=mostrar");
        }else{
            
            $data['error'] = "Ha ocurrido un error al procesar la reserva prueba con otro tramo horario";
            $this->mostrar($data);
        }
    }


    public function insertarReserva(){
        if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["realname"])){
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $realname = $_REQUEST["realname"];

            $result = $this->users->insertarReserva($username,$password,$realname);

            if($result>0){
                header("Location: index.php?controller=reservasController&action=mostrar");

            }else{
                header("index.php?controller=ResourcesController&action=list");
            }


            
            
            
    }
}





    public function mostrar($data = null){

        $data['reservas'] = $this->reservas->reservasList();

        $data['login'] = Security::getUserId();

        $this->view->show("reservas/mostrarReservas",$data);
    }



    public function eliminar(){
        $result = $this->reservas->eliminar();

        if($result){
         
            header("Location: index.php?controller=reservasController&action=mostrar");

        }else{
            header("Location: index.php?controller=reservasController&action=mostrar");
        }


    }

}