<?php

include_once("db.php");

class TimeSlots
{

    /**
     * Constructor de la clase.
     * Crea una conexión con la base de datos y la asigna a la variable $this->db
     */
    public function __construct()
    {
        DB::createConnection();
    }

    /**
     * Comprueba si un email y una password pertenecen a algún timeslots de la base  de datos.
     * @param String $email El email del timeslots que se quiere comprobar
     * @param String $pass La contraseña del timeslots que se quiere comprobar
     * @return User $timeslots Si el timeslots existe, devuelve un objeto con todos los campos del timeslots en su interior. Si no, devuelve un objeto null
     */
    
    public static function timeslotslist() //esta funcion devuelve todos los elementos que hay en la tabla
    {
       $result = DB::dataQuery("SELECT * FROM timeslots");
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