<?php
echo "<br><h6> Bienvenido usuario </h6><br>
<h6> Menu de opciones </h6> <br>
<ul class='list-group-flush '> 
    <li class='list-group-item '><a href='index.php?controller=ResourcesController&action=list'>Mantenimiento de Recursos</a></li>
    <li class='list-group-item '><a href='index.php?controller=TimeSlotsController&action=list'>Mantenimiento de TimeSlots</a> </li>
    <li class='list-group-item '><a href='index.php?controller=usersController&action=list'>Mantenimiento de Users</a> </li>
<p></p>
</ul>";