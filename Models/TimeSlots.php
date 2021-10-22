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
        $result = DB::dataQuery("SELECT * FROM timeslots WHERE id=$id");
       return $result;

    }
    
    public function eliminarTimeSlots($idtimeslots){
        

            // Recuperamos el id del libro y lanzamos el DELETE contra la BD
            $result = DB::dataManipulation("DELETE FROM timeslots WHERE id = '$idtimeslots'");

            // Mostramos mensaje con el resultado de la operación
            

    }
    public function insertarTimeSlots(){
        if(isset($_REQUEST["dayOfWeek"]) && isset($_REQUEST["startTime"]) && isset($_REQUEST["endTime"])){
            $dayofweek = $_REQUEST["dayOfWeek"];
            $starttime = $_REQUEST["startTime"];
            $endtime = $_REQUEST["endTime"];

            $result = DB::dataManipulation("INSERT INTO timeslots(dayOfWeek,startTime,endTime) VALUES ('$dayofweek', '$starttime', '$endtime')");         
    }


           

    }
    public function modificarTimeSlots($id){
        if(isset($_REQUEST["dayOfWeek"]) && isset($_REQUEST["startTime"]) && isset($_REQUEST["endTime"])){
            
            $dayofweek = $_REQUEST["dayOfWeek"];
            $starttime = $_REQUEST["startTime"];
            $endtime = $_REQUEST["endTime"];
            
        
            $result = DB::dataManipulation("UPDATE timeslots SET dayofweek='$dayofweek', starttime='$starttime', endtime='$endtime' WHERE id='$id'");
            
        }
        
    }

    }
?>