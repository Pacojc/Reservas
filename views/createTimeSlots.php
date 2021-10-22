<?php
echo "<form action = 'index.php?controller=TimeSlotsController&action=insertarTimeSlots' enctype='multipart/form-data' method = 'post'>
                    dia de la semana:<input type='text' name='dayOfWeek'><br>
                    inicio:<input type='text' name='startTime'><br>
                    fin:<input type='text' name='endTime'><br>";

echo "<input type='submit' value='enviar'>";
