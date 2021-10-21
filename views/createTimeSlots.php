<?php
echo "<form action = 'index.php?controller=TimeSlotsController&action=insertarTimeSlots' enctype='multipart/form-data' method = 'post'>
                    nombre:<input type='text' name='dayOfWeek'><br>
                    descripción:<input type='text' name='startTime'><br>
                    localización:<input type='text' name='endTime'><br>";

echo "<input type='submit' value='enviar'>";
