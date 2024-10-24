<?php

spl_autoload_register(function ($nombre) {

    $nombre = strtolower($nombre);

    switch($nombre)
    {
        case 'campo':
        case 'elemento':      
        case 'input':     
        case 'textarea':     
        case 'select':     
            require_once "lib/form/{$nombre}.php";
        break;
        default:

            require_once "lib/{$nombre}/{$nombre}.php";
        break;
    }


});
