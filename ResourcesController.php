<?php

include_once ("view.php");
include_once ("Models/Resources.php");
include_once ("Models/users.php");
include_once ("models/security.php");

class ResourcesController
{


    private $resources,$view;

    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->resources = new Resources(); // Modelo de usuarios
        $this->users = new users();


        if(Security::thereIsSession()==false){
            header("Location: index.php?controller=usersController&action=login");
        }


    }

    /** 
     * Este metodo carga los recursos llamando al metodo resourceslist que se encuentra en el modelo de 
     * resources y lo guarda en una posicion del array data.
     * Posteriormente cargamos los datos del usuario que tenga sesion iniciada y nuevamente lo guardamos en una posicion del array data.
     * El array que en el que metemos los datos se lo pasamos a la vista ResourcesList
     */
    public function list(){
        $data['list'] = $this->resources->resourceslist();
        $data['login'] = $this->users->usuarioLogueado();
        $this->view->show("resources/ResourcesList", $data);
    }
    /**
     * Unicamente muestra la vista que contiene el formulario de creacion de recursos.
     */
    public function mostrarFormulario(){
        $this->view->show("resources/createResources");
    }
    /**
     * Llama al método insertar recursos a los que se les pasara los datos que se han metido previamente en el formulario, una vez
     * terminado esto redireccionamos a la vista de recursos.
     */
    public function insertarRecurso(){
        $this->resources->insertarRecurso();
        header("Location: index.php?controller=ResourcesController&action=list");
}
    /**
     * Cogemos el id del recurso que se quiera editar y se lo pasamos a un metodo que lo busca dentro de todos los recursos
     * para cargar sus datos en el formulario de edicion.
     */
    public function editarRecurso(){
        $id = $_REQUEST['id'];
            $data['resource'] = $this->resources->encontrar($id);
            $this->view->show("resources/updateResources", $data);
            
            
    }

    /**
     * Cogemos el id del recurso a editar y los nuevos valores reemplazan a los anteriores.
     */
    public function editar(){
        $id = $_REQUEST['id'];
        $this->resources->modificarRecurso($id);

    header("Location: index.php?controller=ResourcesController&action=list");
    }
    /**Coge el ide del recurso que se desea eliminar y se lo pasa como parametro al metodo distinguiendolo por el id. */
    public function eliminar(){
        $id = $_REQUEST["id"];
        $this->resources->eliminarRecurso($id);
        header("Location: index.php?controller=ResourcesController&action=list");




     
    }
    
}