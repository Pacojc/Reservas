<?php

$r = $data["resource"][0];
//print_r($r);
$name= $r["name"];
$description = $r["description"];
$location = $r["location"];
$reservations = $r["reservations"];
$id = $_REQUEST["id"];



echo "<form action = 'index.php?controller=ResourcesController&action=editar&id=$id' enctype='multipart/form-data' method = 'post'>
nombre:<input type='text' name='name' value='$name'required><br>
descripción:<input type='text' name='description'value='$description'required><br>
localización:<input type='text' name='location'value='$location'required><br>





<img src='$reservations' width='150px' height='100px'/><br><br>
imagen:<input type='file' name='reservations'><br>";

echo "<input type='submit' value='enviar'>";