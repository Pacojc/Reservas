<?php

$r = $data["resource"][0];
//print_r($r);
$name= $r["name"];
$description = $r["description"];
$location = $r["location"];
$reservations = $r["reservations"];
$id = $_REQUEST["id"];



echo "<form action = 'index.php?controller=ResourcesController&action=editar&id=$id' enctype='multipart/form-data' method = 'post'>
nombre:<input type='text' name='name' value='$name'><br>
descripción:<input type='text' name='description'value='$description'><br>
localización:<input type='text' name='location'value='$location'><br>
reserva:<input type='text' name='reservations'value='$reservations'><br>";

echo "<input type='submit' value='enviar'>";