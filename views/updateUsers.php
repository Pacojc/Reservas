<?php

$r = $data["user"][0];
//print_r($r);
$username= $r["username"];
$password = $r["password"];
$realname = $r["realname"];

$id = $_REQUEST["id"];



echo "<form action = 'index.php?controller=usersController&action=editar&id=$id' enctype='multipart/form-data' method = 'post'>
nombre:<input type='text' name='username' value='$username'><br>
descripción:<input type='text' name='password'value='$password'><br>
localización:<input type='text' name='realname'value='$realname'><br>";

echo "<input type='submit' value='enviar'>";