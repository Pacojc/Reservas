<?php

include_once("db.php");

class TimeSlots
{

    
    public function __construct()
    {
        DB::createConnection();
    }

    
    public function timeslotslist() //esta funcion devuelve todos los elementos que hay en la tabla
    {
       $result = DB::dataQuery("SELECT * FROM timeslots");
       return $result;
    }
    public function encontrar($id){
        $result = DB::dataQuery("SELECT * FROM tiemeslots   WHERE id=$id");
       return $result;

    }
    
    public function eliminarTimeslots($idtimeslots){
        

            // Recuperamos el id del libro y lanzamos el DELETE contra la BD
            $result = DB::dataManipulation("DELETE FROM timeslots WHERE id = '$idtimeslots'");

            // Mostramos mensaje con el resultado de la operación
            if ($result->affected_rows == 0) {
                echo "error no fue eliminado";
            } else {
                echo "eliminado con éxito";
            }
            

    }
    public function insertarTimeslots($idtimeslots,$dayofweek,$starttime,$endtime){
            $result = DB::dataManipulation("INSERT INTO timeslots(id,dayofweek,starttime,endtime) VALUES ('$idtimeslots','$dayofweek', '$starttime', '$endtime')");

            if ($result->affected_rows == 0) {
                echo "error no fue insertado";
            } else {
                echo "insertado con éxito";
            }

    }
    public function modificarTimeslots($idtimeslots,$dayofweek,$starttime,$endtime){
        $result = DB::dataManipulation("UPDATE timeslots SET dayofweek='$dayofweek', starttime='$starttime', endtime='$endtime' WHERE id='$idtimeslots'");
    }

    }
?>