<?php

    class Respuesta{
        public $estado="";
        public $mensaje="";
        public $datos="";
    }

    class Usuario extends Respuesta{
        public $nombre="";
        public $ci="";
        public $fecha_nac="";
        public $email="";
    }

?>