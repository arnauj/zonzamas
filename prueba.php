

<?php



    require "general.php";


    $libro = new Libro();

    $campos['paso']         = '1';
    $campos['nombre']        = 'El libro de Eli';
    $campos['descripcion']   = 'asdf asdfasdfasfdasdfasdf';
    $campos['editorial']     = 'AY';
    $campos['autor']         = 'Pedro S';




    $libro->inicializar($campos);

    $libro->insertar();

    $libro->nombre = "El cromo  de Ginés";

    $libro->actualizar();

    echo '>>>>'. $libro->id.'|'. $libro->nombre .'<<<<';

