<?php




define('EREG_TEXTO_100_OBLIGATORIO','/^.{1,100}$/');
define('EREG_TEXTO_150_OBLIGATORIO','/^.{1,150}$/');



spl_autoload_register(function ($nombre) {

    $nombre = strtolower($nombre);

    switch($nombre)
    {
        case 'campo':
        case 'hidden':
        case 'elemento':      
        case 'input':     
        case 'textarea':     
        case 'select':     
            require_once "lib/form/{$nombre}.php";
        break;
        case 'libro':     
            require_once "lib/tablas/libro.php";
        break;
        case 'tabla':     
            require_once "lib/tablas/tabla.php";
        break;
        default:

            require_once "lib/{$nombre}/{$nombre}.php";
        break;
    }


});
