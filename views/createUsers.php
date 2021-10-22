<?php
echo "<form action = 'index.php?controller=usersController&action=insertarUser' enctype='multipart/form-data' method = 'post'>
                    nombre de usuario:<input type='text' name='username'><br>
                   contraseña:<input type='text' name='password'><br>
                   nombre real:<input type='text' name='realname'><br>";

echo "<input type='submit' value='enviar'>";