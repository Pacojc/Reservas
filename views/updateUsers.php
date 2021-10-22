<?php

$r = $data["user"][0];
//print_r($r);
$username= $r["username"];
$password = $r["password"];
$realname = $r["realname"];

$id = $_REQUEST["id"];



echo "<form action = 'index.php?controller=usersController&action=editar&id=$id' enctype='multipart/form-data' method = 'post'>
Nombre de usuario:<input type='text' name='username' value='$username'><br>
contraseña:<input type='text' name='password'value='$password'><br>
Nombre real:<input type='text' name='realname'value='$realname'><br>";

echo "<input type='submit' value='enviar'>";