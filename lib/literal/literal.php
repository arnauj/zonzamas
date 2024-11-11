<?php

    class Literal
    {
        //instancia única
        private static $instance;


        public function __construct($idioma='ES')
        {

            switch($idioma)
            {
                case 'ES':
                    $this->lit = [
                        'nombre'      => 'Nombre'
                       ,'descripcion' => 'Descripción'
                       ,'autor'       => 'Autor'
                       ,'editorial'   => 'Editorial'
                       ,'enviar'      => 'Enviar'
                       ,'error_gen'   => 'El campo es inválido'
                       ,'nuevo'       => 'Nuevo'
                       ,'editar'      => 'Editar'
 
                    ];

                break;
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
    }