<?php
$fecha = $data['fecha'];
$idRecurso = $data['idRecurso'];
$timeslots = $data['timeslots'];
$recurso = $data['recurso'][0];
$usuario = $data['usuario'][0];
$idUsuario = $usuario['id'];
$fechaRaw = $data['fechaRaw'];

echo "<form method='POST' action='index.php?controller=reservasController&action=crearReserva'>";
echo "Vas a reservar el recurso: ".$recurso['name'];
echo "<br>";
echo "El dia $fecha ".$data['fechaRaw'];
echo "<br>";
echo "Reserva a nombre de: ".$usuario['realname'];
echo "<br>";

echo "<input type='hidden' name='idRecurso' value='$idRecurso'>";
echo "<input type='hidden' name='idUsuario' value='$idUsuario'>";
echo "<input type='hidden' name='fechaRaw' value='$fechaRaw'>";


echo "Seleccione el tramo que quiere reservar: ";
echo "<select id='idTimeslots' name='idTimeslots'>";
foreach ($timeslots as $timeslot) {
    $id = $timeslot['id'];
    echo "<option value='$id'>";
    echo substr($timeslot['startTime'],0,5)." - ".substr($timeslot['endTime'],0,5);
    echo "</option>";
}

echo "</select>";
echo "<br>";
echo "Comentarios:<br><textarea id='remarks' name='remarks'></textarea>";
echo "<br>";
echo "<button type=submit>Hacer reserva</button>";
echo "</form>";





