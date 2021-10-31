<?php

include_once ("view.php");
include_once ("Models/users.php");
//include ("models/security.php");

class UsersController
{


    private $users,$view;

    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->users = new users(); // Modelo de usuarios
    }

    
    public function list(){
        $data['list'] = $this->users->userslist();
        $this->view->show("usersList", $data);
    }

    public function mostrarFormulario(){
        $this->view->show("createUsers");
    }

    public function insertarUser(){
        if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["realname"])){
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $realname = $_REQUEST["realname"];

            $this->users->insertarUser($username,$password,$realname);
            header("Location: index.php?controller=usersController&action=list");
            
            
    }
}

    public function editarUser($id){
            $data['user'] = $this->users->encontrar($id);
            $this->view->show("updateUsers", $data);
            
    }


    public function editar($id){

if( isset($_REQUEST["id"]) && isset($_REQUEST["username"]) && isset($_REQUEST["password"]) && isset($_REQUEST["realname"])){
            $id = $_REQUEST["id"];
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $realname = $_REQUEST["realname"];
            

            $this->users->modificarUser($id,$username,$password,$realname);
            header("Location: index.php?controller=usersController&action=list");
    }
    }
    public function eliminar(){
        $id = $_REQUEST["id"];
        $this->users->eliminarUser($id);
        header("Location: index.php?controller=usersController&action=list");



     
    }
    public function registro(){
        if(Security::thereIsSession()){
            header("Location: index.php");
        }
        $this->view->show("register");
    }
    public function login($data = null){
        if(Security::thereIsSession()){
            header("Location: index.php");
        }


        $this->view->show("login", $data);
    }



    public function loginUsuario(){
        $result = $this->users->checklogin();

        if($result){
            header("Location: index.php");
        }else{
            $data['error'] = "Error, usuario o contraseña incorrectos!!";
            $this->login($data);
        }
    }

    public function crearUsuario(){
        $result = $this->users->crearUsuario();

        if($result){
            header("Location: index.php?controller=usersController&action=login");
        }else{
            echo"error";
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
        header("Location: index.php");
    }
   
    
    
}