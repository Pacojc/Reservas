<?php
    include_once("db.php");

    Class reservas{
        

        public function crearReserva(){

            $idRecurso = $_REQUEST['idRecurso'];
            $idUser = $_REQUEST['idUsuario'];
            $date= $_REQUEST['fechaRaw'];
            $idTimeSlots = $_REQUEST['idTimeslots'];
            $remarks = $_REQUEST['remarks'];
            $result = DB::dataManipulation("INSERT INTO reservations(idResource,idUser,idTimeSlots,date,remarks) VALUES ('$idRecurso', '$idUser', '$idTimeSlots', '$date','$remarks')");
            

            return $result;
        }



    }