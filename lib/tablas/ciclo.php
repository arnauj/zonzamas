<?php



    class Ciclo extends Tabla
    {
        const TABLA = 'ciclos';


        function __construct()
        {
            parent::__construct(self::TABLA);

        }


        function listaCiclos()
        {
            $lista_ciclos = [];

            $opt = [];
            
            $opt['select']['nombre']     = '';
            $opt['select']['siglas']     = '';
            $opt['select']['curso']      = '';
            $opt['select']['letra' ]     = '';
      
        
        
            $resultado = $this->seleccionar($opt);


            if ($resultado->num_rows > 0) 
            {
                while ($fila = $resultado->fetch_assoc()) 
                {
                    $lista_ciclos[$fila['curso'].$fila['siglas'].$fila['letra']] = "[{$fila['curso']}{$fila['siglas']}{$fila['letra']}] {$fila['nombre']}";                }

            }

            return $lista_ciclos;

        }


    }