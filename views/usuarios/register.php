<?php


if(isset($data['error'])){
    echo "<h2 style='color:red'>";
    
    echo $data['error'];
    
    echo "</h2>";
}



echo "<form action = 'index.php?controller=usersController&action=crearUsuario' enctype='multipart/form-data' method = 'post'>

    <div class='form-group'> <!--Nombre de usuario -->
        <label for='full_name_id' class='control-label'>Nombre de usuario</label>
        <input type='text' class='form-control' id='username' name='username'>
    </div>    

    <div class='form-group'> <!-- Contraseña-->
    <label for='password_id' class='control-label'>Contraseña</label>
    <input type='password' class='form-control' id='password' name='password' >
    </div>
    
    <div class='form-group'> <!--Nombre Completo -->
    <label for='full_name_id' class='control-label'>Nombre Completo</label>
    <input type='text' class='form-control' id='realname' name='realname'>
    </div>    

                                       
                            
   
    
    <div class='form-group'> <!-- Registro -->
        <button type='submit' class='btn btn-primary'>Registro</button>
    </div>     
    
</form>";