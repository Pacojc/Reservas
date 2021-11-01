<?php
$recursos = $data['recursos'];
$seleccionado = $data['seleccionado'];





echo "<form method='POST' action='index.php?controller=reservasController&action=mostrarFormulario2'>";
echo "Seleccione el recurso que desea reservar:  ";
//echo "<br>";

echo "<select id='idRecurso' name='idRecurso'>";

foreach ($recursos as $recurso) {
    $id = $recurso['id'];
    echo "<option value='$id'";
    
    if($seleccionado == $id)
    {
        echo "selected";
    }


    echo ">";
    echo $recurso['name'];
    echo "</option>";
}

echo "</select>";

echo "<br>";
echo "Seleccione el dia de la reserva:  ";
echo "<input type='date' name='fecha' id='fecha' 
min='2021-10-28' required>";

echo "<br>";
echo "<button type=submit>Mostrar horario</button>";
echo "</form>";