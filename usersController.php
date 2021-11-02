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
        $this->view->show("usuarios/usersList", $data);
    }

    public function mostrarFormulario(){
        $this->view->show("usuarios/createUsers");
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

    public function editarUser(){
            $data['user'] = $this->users->encontrar();
            $this->view->show("usuarios/updateUsers", $data);
            
    }


    public function editar(){

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
        /**
         * Este metodo puede ser invocado pasandole parametros o no, normalmente le pasaremos parametros para indicar que una accion 
         * es correcta o no.
         * Si un usuario tiene una sesion iniciada e intenta acceder a este metodo sera redireccionado directamente al index.
         * En definitiva este metodo muestra el formulario de registro
         */
    public function registro($data = null){
        if(Security::thereIsSession()){
            header("Location: index.php");
        }
        $this->view->show("usuarios/register", $data);
    }

    /**
     * En caso de que un usuario con una sesion iniciada intente entrar al login sera directamente redireccionado a index.
     * Este metodo se encarga de mostrar el formulario de inicio de sesion.
     */
    public function login($data = null){
        if(Security::thereIsSession()){
            header("Location: index.php");
        }


        $this->view->show("usuarios/login", $data);
    }


    /**
     * chekea los datos introducidos en el formulario de inicio de sesion.
     * En caso de introduccir datos validos, te redirige al index con la sesion ya creada.
     * Si introduce datos no validos o caracteres no permitidos llamaremos a la vista que muestra el formulario de login,
     * pasandole como parametro el error.
     */
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

        if($result==1){
            header("Location: index.php?controller=usersController&action=login");
        }else{
            $data['error'] = "El usuario ya existe o ha utilizado carácteres no permitidos";
            $this->registro($data);
        }
    }

    /**
     * Cierra la sesión
     */    
    public function closeSession() {
        Security::closeSession();
        header("Location: index.php");
    }
   
    
    
}