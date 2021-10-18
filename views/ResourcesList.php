<?php

    
    $resources = $data["list"];

/* if isset($data['message']){
    echo $data['message'];
    echo "<br>"
} */

   print_r($resources);
   echo "<br><br>";

   echo "<table border ='1'>";
   echo"<tr><th>Nombre</th><th>Descripción</th><th>Localización</th><th>Reserva</th><th>Acciones</th></tr>";
   foreach ($resources as $resource) {
        echo "<tr>";
       echo "<td>".$resource['name']."</td>";
       echo "<td>".$resource['description']."</td>";
       echo "<td>".$resource['location']."</td>";
       echo "<td>".$resource['reservations']."</td>";
       echo "<td>ACCIONEs </td>";
       echo "</tr>";
    }
    echo "</table>";