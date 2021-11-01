<?php



$reservas = $data['reservas'];
$login = $data['login'];

if(isset($data['error'])){
    if(isset($data['error'])){
        echo "<h2 style='color:red'>";
        
        echo $data['error'];
        
        echo "</h2>";
    }
    
}


//echo "HOOOOLLA";




echo "<section class='ftco-section'>
<div class='container'>
<div class='row justify-content-center'>
<div class='col-md-6 text-center mb-5'>
</div>
</div>";






echo "<div class='row'>
<div class='col-md-12'>
<div class='table-wrap'>
<table class='table'>
<thead class='thead-primary'>
<tr>
<th>Recurso</th>
<th>Descripción del recurso</th>
<th>Localización del recurso</th>
<th>Imagen del recurso</th>
<th>Fecha de la reserva</th>
<th>Tramo reservado</th>
<th>Profesor</th>
<th>Comentarios</th>

<th>Acciones</th>
</tr>
</thead>
<tbody>";
foreach ($reservas as $reserva) {
    $idResource=$reserva['idResource'];
    $idUser = $reserva['idUser'];
    $idTimeSlots = $reserva['idTimeSlots'];
    
    $reservations = $reserva['reservations'];
echo "<tr>
<th scope='row' class='scope'>".$reserva['name']."</th>
<td>".$reserva['description']."</td>
<td>".$reserva['location']."</td>
<td> <img src='$reservations' width='150px' height='100px'></td>";
echo "<td>". substr($reserva['date'],0,10) ."</td>
<td>". substr($reserva['startTime'],0,5) ." ". substr($reserva['endTime'],0,5) ."</td>
<td>".$reserva['realname']."</td>
<td>".$reserva['remarks']."</td>
<td>";





if($idUser == $login){
    echo "<a href='index.php?controller=reservasController&action=eliminar&idResource=$idResource&idUser=$idUser&idTimeSlots=$idTimeSlots' class='btn btn-primary'>Eliminar</a>";
}




echo "</td>
</tr>
</tbody>";
}
echo " </table>

</div>
</div>
</div>
</div>
</section> ";
