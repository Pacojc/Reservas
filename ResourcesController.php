<?php

include_once ("view.php");
include_once ("Models/Resources.php");
//include ("models/security.php");

class ResourcesController
{


    private $resources,$view;

    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->resources = new Resources(); // Modelo de usuarios
    }

    
    public function list(){
        $data['list'] = $this->resources->resourceslist();
        $this->view->show("ResourcesList", $data);
    }

    public function mostrarFormulario(){
        $this->view->show("createResources");
    }

    public function insertarRecurso(){
        if(isset($_REQUEST["name"]) && isset($_REQUEST["description"]) && isset($_REQUEST["location"]) && isset($_REQUEST["reservations"])){
            $name = $_REQUEST["name"];
            $description = $_REQUEST["description"];
            $location = $_REQUEST["location"];
            $reservations = $_REQUEST["reservations"];

            $this->resources->insertarRecurso($name,$description,$location,$reservations);
            
            
    }
}

    public function editarRecurso($id){
            $data['resource'] = $this->resources->encontrar($id);
            $this->view->show("updateResources", $data);
            
    }


    public function editar($id){

if( isset($_REQUEST["id"]) && isset($_REQUEST["name"]) && isset($_REQUEST["description"]) && isset($_REQUEST["location"]) && isset($_REQUEST["reservations"])){
            $id = $_REQUEST["id"];
            $name = $_REQUEST["name"];
            $description = $_REQUEST["description"];
            $location = $_REQUEST["location"];
            $reservations = $_REQUEST["reservations"];

            $this->resources->modificarRecurso($id,$name,$description,$location,$reservations);
    }
    }

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    

    /**
     * Muestra el formulario de login
     */
    public function showLoginForm()
    {
        $this->view->show("loginForm");
    }
    public function eliminar($id){
        $this->resources->eliminarRecurso($id);




      $id = $_REQUEST["id"];
    }
    /**
     * Procesa el formulario de login y, si es correcto, inicia la sesión con el id del usuario.
     * Redirige a la vista de selección de rol.
     */
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