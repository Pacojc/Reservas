<?php

include_once("db.php");

class Resources
{

    public function __construct()
    {
        DB::createConnection();
    }

    
    
    public function resourceslist() //esta funcion devuelve todos los elementos que hay en la tabla
    {
       $result = DB::dataQuery("SELECT * FROM resources");
       return $result;
    }

    public function encontrar($id){
        $result = DB::dataQuery("SELECT * FROM resources WHERE id=$id");
       return $result;

    }



    public function eliminarRecurso($idResources){
        

            // Recuperamos el id del libro y lanzamos el DELETE contra la BD
            $result = DB::dataManipulation("DELETE FROM resources WHERE id = '$idResources'");


    }
    public function insertarRecurso(){
        if(isset($_REQUEST["name"]) && isset($_REQUEST["description"]) && isset($_REQUEST["location"]) && isset($_FILES["reservations"])){
            $name = $_REQUEST["name"];
            $description = $_REQUEST["description"];
            $location = $_REQUEST["location"];
            //$reservations = $_REQUEST["reservations"];


            $target_path = "D:/xampp/htdocs/dwes/reservas/imagenes/";
        $target_path = $target_path . basename( $_FILES['reservations']['name']); 
        if(move_uploaded_file($_FILES['reservations']['tmp_name'], $target_path)) {
         $reservations = "http://localhost/dwes/reservas/imagenes/".basename( $_FILES['reservations']['name']);
        } else{
            echo "Ha ocurrido un error, trate de nuevo!";
        }






            $result = DB::dataManipulation("INSERT INTO resources(name,description,location,reservations) VALUES ('$name', '$description', '$location', '$reservations')");
            
            
    }
            

           

    }
    public function modificarRecurso($id){
        if(isset($_REQUEST["name"]) && isset($_REQUEST["description"]) && isset($_REQUEST["location"])){
            $name = $_REQUEST["name"];
            $description = $_REQUEST["description"];
            $location = $_REQUEST["location"];
            $reservations = $_REQUEST["reservations"];



            if ($_FILES['reservations']['name']!="") {
       
                $target_path = "D:/xampp/htdocs/dwes/reservas/imagenes/";
                $target_path = $target_path . basename( $_FILES['reservations']['name']); 
                if(move_uploaded_file($_FILES['reservations']['tmp_name'], $target_path)) {
                 $reservations = "http://localhost/dwes/reservas/imagenes/".basename( $_FILES['reservations']['name']);
                } else{
                    echo "Ha ocurrido un error, trate de nuevo!";
                }
                $result = DB::dataManipulation("UPDATE resources SET name='$name', description='$description', location='$location', reservations='$reservations' WHERE id='$id'");
            }else{
                $result = DB::dataManipulation("UPDATE resources SET name='$name', description='$description', location='$location' WHERE id='$id'");
            }














            
           
    }
        
    }

    }
?>