<?php

    class BBDD
    {
        //instancia única
        private static $instance;

        //Datos de conexión
        private const SERVIDOR = 'localhost';
        private const USUARIO  = 'juanra';
        private const PASSWORD = 'DaWSegundo+';
        private const BBDD     = 'biblioteca';


        private function __construct()
        {      
            $this->conexion = new mysqli(self::SERVIDOR, self::USUARIO, self::PASSWORD, self::BBDD);
        
            if ($this->conexion->connect_error) 
            {
                die("Conexión fallida: " . $this->conexion->connect_error);
            }
        
        }

        static public function getInstance()
        {

            if (empty(self::$instance))
            {
                self::$instance = new self();
            }

            return self::$instance;
        }

        function __desctruct()
        {
            self::$instance->conexion->close();
        }


        static public function query($query)
        {
            self::getInstance();

            return self::$instance->conexion->query($query);
        }
    }

