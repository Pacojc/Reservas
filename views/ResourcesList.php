<?php

    
    $resources = $data["list"];

/* if isset($data['message']){
    echo $data['message'];
    echo "<br>"
} */

   //print_r($resources);

    

    echo "<section class='ftco-section'>
    <div class='container'>
    <div class='row justify-content-center'>
    <div class='col-md-6 text-center mb-5'>
    </div>
    </div>
    <a href='index.php?controller=ResourcesController&action=mostrarFormulario' class='btn btn-dark'>Añadir</a>
    <div class='row'>
    <div class='col-md-12'>
    <div class='table-wrap'>
    <table class='table'>
    <thead class='thead-primary'>
    <tr>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Localización</th>
    <th>Imagen</th>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>";
    foreach ($resources as $resource) {
        $id=$resource['id'];
        $reservations = $resource['reservations'];
    echo "<tr>
    <th scope='row' class='scope'>".$resource['name']."</th>
    <td>".$resource['description']."</td>
    <td>".$resource['location']."</td>
    <td> <img src='$reservations' width='150px' height='100px'></td>

    
    <td><a href='index.php?controller=ResourcesController&action=eliminar&id=$id' class='btn btn-primary'>Eliminar</a>
    <a href='index.php?controller=ResourcesController&action=editarRecurso&id=$id' class='btn btn-success'>Editar</a></td>
    </tr>
    </tbody>";
    }
   echo " </table>
    
    </div>
    </div>
    </div>
    </div>
    </section> ";