<?php
echo "<form action = 'index.php?controller=ResourcesController&action=insertarRecurso' enctype='multipart/form-data' method = 'post'>
                    nombre:<input type='text' name='name'><br>
                    descripción:<input type='text' name='description'><br>
                    localización:<input type='text' name='location'><br>
                    reserva:<input type='text' name='reservations'><br>";

echo "<input type='submit' value='enviar'>";







    