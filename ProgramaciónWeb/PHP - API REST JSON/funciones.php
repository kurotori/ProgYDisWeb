<?php
    

    function GenerarToken(){
        $tiempo = time();
        $sesion_id = session_id();

        $ID = password_hash($tiempo.$sesion_id, PASSWORD_BCRYPT);
        return $ID;

    }
?>