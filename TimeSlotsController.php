<?php
include_once ("view.php");
include_once ("Models/TimeSlots.php");
//include ("models/security.php");

class TimeSlotsController
{

    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->TimeSlots = new TimeSlots(); // Modelo de usuarios
    }

    public function list(){
        $data['list'] = $this->timeslots->timeslotslist();
        $this->view->show("TimeSlotsList", $data);
    }
    private $view, $TimeSlots;

    public function mostrarFormulario(){
        $this->view->show("createTimeSlots");
    }

    public function showLoginForm()
    {
        $this->view->show("loginForm");
    }

   
    public function processLoginForm()
    {

        // Validación del formulario
        if (Security::filter($_REQUEST['email']) == "" || Security::filter($_REQUEST['pass']) == "") {
            // Algún campo del formulario viene vacío: volvemos a mostrar el login
            $data['errorMsg'] = "El email y la contraseña son obligatorios";
            $this->view->show("loginForm", $data);
        }
        else {
            // Hemos pasado la validación del formulario: vamos a procesarlo
            $email = Security::filter($_REQUEST['email']);
            $pass = Security::filter($_REQUEST['pass']);
            $userData = $this->user->checkLogin($email, $pass);
            if ($userData!=null) {
                // Login correcto: creamos la sesión y pedimos al usuario que elija su rol
                Security::createSession($userData->id);
                
            }
            else {
                $data['errorMsg'] = "Usuario o contraseña incorrectos";
                $this->view->show("loginForm", $data);
            }
        }
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