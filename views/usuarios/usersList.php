<?php

    
    $users = $data["list"];

/* if isset($data['message']){
    echo $data['message'];
    echo "<br>"
} */

   //print_r($users);

    

    echo "<section class='ftco-section'>
    <div class='container'>
    <div class='row justify-content-center'>
    <div class='col-md-6 text-center mb-5'>
    </div>
    </div>
    <a href='index.php?controller=usersController&action=mostrarFormulario' class='btn btn-dark'>Añadir</a>
    <div class='row'>
    <div class='col-md-12'>
    <div class='table-wrap'>
    <table class='table'>
    <thead class='thead-primary'>
    <tr>
    <th>Nombre de usuario</th>
    <th>Nombre real</th>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>";
    foreach ($users as $user) {
        $id=$user['id'];
    echo "<tr>
    <th scope='row' class='scope'>".$user['username']."</th>
    <td>".$user['realname']."</td>
    

    
    <td><a href='index.php?controller=usersController&action=eliminar&id=$id' class='btn btn-primary'>Eliminar</a>
    <a href='index.php?controller=usersController&action=editarUser&id=$id' class='btn btn-success'>Editar</a></td>
    </tr>
    </tbody>";
    }
   echo " </table>
    
    </div>
    </div>
    </div>
    </div>
    </section> ";