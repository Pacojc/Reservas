<?php
    include_once("db.php");
    include_once("security.php");

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



        public function reservasList() //esta funcion devuelve todos los elementos que hay en la tabla
    {
       $result = DB::dataQuery("SELECT *
       FROM resources 
       INNER JOIN reservations ON resources.id = reservations.idResource
       INNER JOIN users ON reservations.idUser = users.id
       INNER JOIN timeslots ON reservations.idTimeSlots = timeslots.id;");
       return $result;
    }




    public function eliminar(){

        if(isset($_REQUEST['idResource']) && isset($_REQUEST['idUser']) && isset($_REQUEST['idTimeSlots'])){
            $idResource=$_REQUEST['idResource'];
            $idUser = $_REQUEST['idUser'];
            $idTimeSlots = $_REQUEST['idTimeSlots'];


            if(Security::getUserId() == $idUser){
                $result = DB::dataManipulation("DELETE FROM reservations WHERE idResource = $idResource AND idUser = $idUser AND idTimeSlots = $idTimeSlots");

                return $result;
            }else{
                return null;
            }


            


            


        }else{
            return null;
        }

        


    }



    }