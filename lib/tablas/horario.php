<?php



    class Horario extends Tabla
    {
        const TABLA = 'horarios';


        function __construct()
        {
            parent::__construct(self::TABLA);

        }


        function cargar($ciclo)
        {
            $lista_horarios = [];

            $opt = [];
            
            $opt['select']['hora_desde']                    = '';
            $opt['select']['hora_hasta']                    = '';
            $opt['select']['dia']                           = '';
            $opt['select']['m.nombre AS nombre_modulo' ]    = '';
            $opt['select']['m.siglas AS siglas_modulo' ]    = '';
            $opt['select']['pe.nombre AS nombre_profesor' ] = '';
            $opt['select']['color' ]                        = '';

            $opt['from'] = '
                                AS h
                ,modulos        AS m 
                ,profesores     AS p 
                ,personas       AS pe
                ,ciclos_modulos AS cm
                ,ciclos         AS c
            ';

            $opt['where_sc']['h.id_modulo']   = 'm.id';
            $opt['where_sc']['m.id_profesor'] = 'p.id';
            $opt['where_sc']['p.id_persona']  = 'pe.id';
            $opt['where_sc']['cm.id_modulo']  = 'm.id';
            $opt['where_sc']['cm.id_ciclo']   = 'c.id';


            
            $opt['where']['c.siglas']      = substr($ciclo,1);
            $opt['where']['c.curso']       = substr($ciclo,0,1);


            $opt['orderby']['hora_desde'] = 'ASC';
      
        
        
            $resultado = $this->seleccionar($opt);


            if ($resultado->num_rows > 0) 
            {
                while ($fila = $resultado->fetch_assoc()) 
                {
                    $lista_horarios[$fila['hora_desde'].'-'.$fila['hora_hasta']][$fila['dia']] = $fila;
                }

            }

            return $lista_horarios;

        }


    }



