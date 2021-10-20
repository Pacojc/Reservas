<?php

    
    $resources = $data["list"];

/* if isset($data['message']){
    echo $data['message'];
    echo "<br>"
} */

   //print_r($resources);

    echo "<a href='index.php?controller=ResourcesController&action=mostrarFormulario'> insertar </a>";

   echo "<br><br>";

   echo "<table border ='1'>";
   echo"<tr><th>Nombre</th><th>Descripción</th><th>Localización</th><th>Reserva</th><th>Acciones</th></tr>";
   foreach ($resources as $resource) {
        echo "<tr>";
       echo "<td>".$resource['name']."</td>";
       echo "<td>".$resource['description']."</td>";
       echo "<td>".$resource['location']."</td>";
       echo "<td>".$resource['reservations']."</td>";
       $id=$resource['id'];
       echo "<td> <a href='index.php?controller=ResourcesController&action=eliminar&id=$id'> eliminar</a>
       <a href='index.php?controller=ResourcesController&action=editarRecurso&id=$id'> editar</a></td>";
       echo "</tr>";
    }
    echo "</table>";