<?php


    $timeslots = $data["list"];


    echo "<section class='ftco-section'>
    <div class='container'>
    <div class='row justify-content-center'>
    <div class='col-md-6 text-center mb-5'>
    </div>
    </div>
    <a href='index.php?controller=TimeSlotsController&action=mostrarFormulario' class='btn btn-dark'>Añadir</a>
    <div class='row'>
    <div class='col-md-12'>
    <div class='table-wrap'>
    <table class='table'>
    <thead class='thead-primary'>
    <tr>
    <th>Dia de la Semana</th>
    <th>fecha inicio</th>
    <th>fecha fin</th>
    <th>Acciones</th>
    </tr>
    </thead>
    <tbody>";
    
    foreach ($timeslots as $timeslot) {
        $id=$timeslot['id'];

        $startime = substr($timeslot['startTime'],0,5);
        $endtime = substr($timeslot['endTime'],0,5);
    echo "<tr>
    <th scope='row' class='scope'>".$timeslot['dayOfWeek']."</th>
    <td>".$startime."</td>
    <td>".$endtime."</td>
    
    <td><a href='index.php?controller=TimeSlotsController&action=eliminar&id=$id' class='btn btn-primary'>Eliminar</a>
    <a href='index.php?controller=TimeSlotsController&action=editarTimeSlots&id=$id' class='btn btn-success'>Editar</a></td>
    </tr>
    </tbody>";
    }
   echo " </table>
    
    </div>
    </div>
    </div>
    </div>
    </section> ";