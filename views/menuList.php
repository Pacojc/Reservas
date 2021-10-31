<?php


if(isset($data['userLogueado'])){
    $datos = $data['userLogueado'][0];
    $type = $datos['type'];
    $username = $datos['username'];
    echo "<br><h6> Bienvenido usuario $username</h6><br>";
}





echo "<h6> Menu de opciones </h6> <br>
<ul class='list-group-flush '> 
    <li class='list-group-item '><a href='index.php?controller=ResourcesController&action=list'>Mantenimiento de Recursos</a></li>";
    echo "<li class='list-group-item '><a href='index.php?controller=reservasController&action=mostrar'>Mantenimiento de Reservas</a> </li>";
    if(isset($data['userLogueado'])){
        if($type==1){
     echo "<li class='list-group-item '><a href='index.php?controller=TimeSlotsController&action=list'>Mantenimiento de TimeSlots</a> </li>
     <li class='list-group-item '><a href='index.php?controller=usersController&action=list'>Mantenimiento de Users</a> </li>";
     
    }
    }

echo "<p></p>
</ul>";