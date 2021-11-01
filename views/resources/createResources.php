<?php
echo "<form action = 'index.php?controller=ResourcesController&action=insertarRecurso' enctype='multipart/form-data' method = 'post'>
                    nombre:<input type='text' name='name'required><br>
                    descripción:<input type='text' name='description'required><br>
                    localización:<input type='text' name='location'required><br>
                    imagen:<input type='file' name='reservations' required><br>";

echo "<input type='submit' value='enviar'>";







    