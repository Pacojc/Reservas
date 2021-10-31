<?php

include_once("db.php");
include_once("security.php");
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
            $password = md5($password);
            $result = DB::dataManipulation("INSERT INTO users(username,password,realname) VALUES ('$username', '$password', '$realname')");

           

    }
    public function modificarUser($idUsers,$username,$password,$realname){
        $password = md5($password);
        $result = DB::dataManipulation("UPDATE users SET username='$username', password='$password', realname='$realname' WHERE id='$idUsers'");
    }

    public function crearUsuario(){
        if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['realname'])){
            $username = $_REQUEST['username'];
            $password = md5($_REQUEST['password']);
            $realname = $_REQUEST['realname'];


        $result = DB::dataManipulation("INSERT INTO users(username,password,realname,type) VALUES ('$username', '$password', '$realname',0)");
        }else{
            $result = null;
        }


        return $result;
    }




    public function checkLogin()
    {

        $username = $_REQUEST['username'];
        $password = md5($_REQUEST['password']);
        

       $result = DB::dataQuery("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

       if ($result){
           
        Security::createSession($result[0]['id']);
            return $result[0];
       }else{
            return null;

    }

    }


    public function usuarioLogueado(){
        $id = Security::getUserId();
        $result = DB::dataQuery("SELECT * FROM users WHERE id=$id");
       return $result;
    }
}