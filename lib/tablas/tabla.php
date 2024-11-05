<?php



abstract class Tabla
{

    var $tabla
       ,$elementos_tabla
    ;



    function __construct($nombre_tabla)
    {
        $this->elementos_tabla = [];
        $this->tabla           = $nombre_tabla;
    }

    function inicializar($campos)
    {
        $sql = "
            SELECT column_name AS column_name
            FROM INFORMATION_SCHEMA.Columns
            WHERE table_schema = database()
            AND table_name = '{$this->tabla}';
        ";


        $resultado = BBDD::query($sql);

        if ($resultado->num_rows > 0) 
        {
            while ($fila = $resultado->fetch_assoc())
            {
                $nombres_campos[$fila['column_name']] = $fila['column_name'];
            }
        }

        foreach($campos as $atributo => $valor_de_atributo)
        {

            if (array_key_exists($atributo,$nombres_campos))
            {
                $this->$atributo = $valor_de_atributo;

                $this->elementos_tabla[$atributo] = $valor_de_atributo;
            }
        }        
    }


    function insertar()
    {
        $_pre_insert;
        $_pos_insert;

        foreach($this->elementos_tabla as $atributo => $valor)
        {
            if ($atributo != 'id')
            {
                $_pre_insert .= ",{$atributo}";
                $_pos_insert .= ",'{$this->$atributo}'";
            }
        }




        $sql = "
            INSERT INTO {$this->tabla}
            (
                ip_alta


                {$_pre_insert}
            )
            VALUES
            (   
                '". $_SERVER['REMOTE_ADDR'] ."'


                {$_pos_insert}
            )
            ;
        ";

        $resultado = BBDD::query($sql);




        $sql = "SELECT LAST_INSERT_ID() AS id; ";

        $resultado = BBDD::query($sql);

        if ($resultado->num_rows > 0) 
        {
            $fila = $resultado->fetch_assoc();

            $this->id = $fila['id'];
            $this->elementos_tabla['id'] = $this->id;
        }


    }

    function actualizar()
    {
        $_update;

        foreach($this->elementos_tabla as $atributo => $valor)
        {
            if ($atributo != 'id')
            {
                $_update .= ",{$atributo} = '{$this->$atributo}' ";
            }
        }





        $sql = "
            UPDATE {$this->tabla}
            SET ip_ult_mod = '". $_SERVER['REMOTE_ADDR'] ."'
               ,fecha_ult_mod = CURRENT_TIMESTAMP

                {$_update}
            WHERE id = '{$this->id}';
        ";

        $resultado = BBDD::query($sql);
    }

    function eliminar()
    {
        $sql = "
            DELETE FROM {$this->tabla}
            WHERE id = '{$this->id}';
        ";

        $resultado = BBDD::query($sql);
    }

    function recuperar($id)
    {
        $sql = "
            SELECT * 
            FROM {$this->tabla}
            WHERE id = '{$id}';
        ";


        $resultado = BBDD::query($sql);


        if ($resultado->num_rows > 0) 
        {
            $fila = $resultado->fetch_assoc();

            $this->inicializar($fila);
        }
    }
    /*
    $opt = [];

    $opt['select']['nombre'] = '';
    $opt['select']['descripcion'] = '';


    $opt['where']['nombre'] = 'Andrés';

    $opt['orderby']['nombre'] = 'ASC';

    $opt['offset'] = 10;
    $opt['limit']  = 10;



    $libro->seleccionar($opt);
    */

    function seleccionar($opt = [])
    {
        $_select = '*';
        if (!empty($opt['select']))
        {
            $_select = '';
            foreach($opt['select'] as $atributo => $valor)
            {
                $_select .= ",{$atributo}";

            }

            $_select = substr($_select,1);
        }


        $_where = 'WHERE 1 = 1';
        if (!empty($opt['where']))
        {
            foreach($opt['where'] as $atributo => $valor)
            {
                $_where .= " AND {$atributo} = '{$valor}' ";

            }
        }
        if (!empty($opt['notwhere']))
        {
            foreach($opt['notwhere'] as $atributo => $valor)
            {
                $_where .= " AND {$atributo} <> '{$valor}' ";

            }
        }


        $_orderby = '';
        if (!empty($opt['orderby']))
        {
            $_orderby = 'ORDER BY ';
            foreach($opt['orderby'] as $atributo => $valor)
            {
                $_orderby .= "{$atributo} {$valor},";

            }
            $_orderby = substr($_orderby,0,strlen($_orderby) -1);
        }

        $_limit  = empty($opt['limit'])? '' : "LIMIT {$opt['limit']} ";
        $_offset = empty($opt['offset'])? '': "OFFSET {$opt['offset']} ";



        $sql = "
            SELECT {$_select}
            FROM {$this->tabla}
            {$_where}
            {$_orderby}
            {$_limit}
            {$_offset}
        ";


        $resultado = BBDD::query($sql);

        return $resultado;

    }



}
