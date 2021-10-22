<?php

include_once("db.php");

class Users
{

    public function __construct()
    {
        DB::createConnection();
    }

    
    
    public function userslist() //esta funcion devuelve todos los elementos que hay en la tabla
    {
       $result = DB::dataQuery("SELECT * FROM users");
       return $result;
    }

    public function encontrar($id){
        $result = DB::dataQuery("SELECT * FROM users WHERE id=$id");
       return $result;

    }



    public function eliminarUser($idUsers){
        

            // Recuperamos el id del libro y lanzamos el DELETE contra la BD
            $result = DB::dataManipulation("DELETE FROM users WHERE id = '$idUsers'");


    }
    public function insertarUser($username,$password,$realname){
            $result = DB::dataManipulation("INSERT INTO users(username,password,realname) VALUES ('$username', '$password', '$realname')");

           

    }
    public function modificarUser($idUsers,$username,$password,$realname){
        $result = DB::dataManipulation("UPDATE users SET username='$username', password='$password', realname='$realname' WHERE id='$idUsers'");
    }

    }
?>