<?php
echo "<table border ='1'>"; //Mostrar Peliculas
echo"<tr><th>day of week</th><th>startTime</th><th>endTime</th></tr>";
while ($fila = $result->fetch_object()) {
    echo "<tr>";
    echo "<td>" . $fila->dayofweek . "</td>";
    echo "<td>" . $fila->starttime. "</td>";
    echo "<td>" . $fila->endtime . "</td>";
    echo "<td><a href='eliminar.php?cod_pelicula=$fila->cod_pelicula'>eliminar</a>  <a href='modificar.php?cod_pelicula=$fila->cod_pelicula'>modificar</a></td>";
    echo "</tr>";

}
echo "</table>";

echo "<a href ='insertar.php'>añadir TimeSlots</a>";