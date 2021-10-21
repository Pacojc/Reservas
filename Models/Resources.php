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
    public function insertarRecurso($name,$description,$location,$reservations){
            $result = DB::dataManipulation("INSERT INTO resources(name,description,location,reservations) VALUES ('$name', '$description', '$location', '$reservations')");

           

    }
    public function modificarRecurso($idResources,$name,$description,$location,$reservations){
        $result = DB::dataManipulation("UPDATE resources SET name='$name', description='$description', location='$location', reservations='$reservations' WHERE id='$idResources'");
    }

    }
?>