<?php

$r = $data["timeslots"][0];
//print_r($r);
$dayofweek= $r["dayOfWeek"];
$starttime = $r["startTime"];
$endtime = $r["endTime"];
$id = $_REQUEST["id"];



echo "<form action = 'index.php?controller=TimeSlotsController&action=editar&id=$id' enctype='multipart/form-data' method = 'post'>
dia de la semana:<input type='text' name='dayOfWeek' value='$dayofweek'><br>
fecha inicio:<input type='text' name='startTime'value='$starttime'><br>
fecha fin:<input type='text' name='endTime'value='$endtime'><br>";


echo "<input type='submit' value='enviar'>";