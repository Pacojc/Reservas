<?php
echo "<form action = 'index.php?controller=TimeSlotsController&action=insertarTimeSlots' enctype='multipart/form-data' method = 'post'>
                    dia de la semana:<input type='text' name='dayOfWeek'><br>
                    inicio:<input type='time' name='startTime'><br>
                    fin:<input type='time' name='endTime'><br>";

echo "<input type='submit' value='enviar'>";
