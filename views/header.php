<?php

include_once("Models/security.php");


echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>
<body>
<nav  class='navbar navbar-expand-md navbar-dark bg-dark mb-4' role='navigation'>
  <!-- Navbar content -->
  <a  class='navbar-brand' href='index.php?controller=menuController&action=list'>Menu</a>
    <a  class='navbar-brand' href='index.php?controller=ResourcesController&action=list'>Recursos</a>";
    
    
    if(Security::thereIsSession()){

      

        echo "<a  class='navbar-brand' href='index.php?controller=usersController&action=closeSession'>Cerrar Sesión</a>";
    }else{
        echo "<a  class='navbar-brand' href='index.php?controller=usersController&action=login'>Iniciar Sesión</a>
    <a  class='navbar-brand' href='index.php?controller=usersController&action=registro'>Registrarse</a>";
    }
    



   
echo "</nav>
    <div class='container'>
        
    

</html>";