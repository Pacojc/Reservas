<?php
include_once ("view.php");
include_once ("Models/TimeSlots.php");
//include ("models/security.php");

class TimeSlotsController
{
    private $view, $TimeSlots;
    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->TimeSlots = new TimeSlots(); // Modelo de usuarios


        if(Security::thereIsSession()==false){
            header("Location: index.php?controller=usersController&action=login");
        }
    }

    public function list(){
        $data['list'] = $this->TimeSlots->timeslotslist();
        $this->view->show("timeslots/TimeSlotsList", $data);
    }
    

    public function mostrarFormulario(){
        $this->view->show("timeslots/createTimeSlots");
    }

    public function insertarTimeSlots(){
   
        $this->TimeSlots->insertarTimeSlots();
    header("Location: index.php?controller=TimeSlotsController&action=list");
}
public function editarTimeSlots(){
    $data['timeslots'] = $this->TimeSlots->encontrar();
    $this->view->show("timeslots/updateTimeSlots", $data);
    
}


public function editar(){

    $this->TimeSlots->modificarTimeSlots();
header("Location: index.php?controller=TimeSlotsController&action=list");
}
    public function eliminar(){
        $id = $_REQUEST["id"];
    $this->TimeSlots->eliminarTimeSlots($id);
    header("Location: index.php?controller=TimeSlotsController&action=list");

}


    /**
     * Muestra el menú de opciones del usuario según la tabla de persmisos
     */
    public function showMainMenu()
    {
        $data['permissions'] = $this->user->getUserPermissions(Security::getRolId());
        $this->view->show("mainMenu", $data);
    }

    /**
     * Cierra la sesión
     */    
    public function closeSession() {
        Security::closeSession();
        $this->view->show("loginForm");
    }

    
    
}