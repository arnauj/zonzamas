<?php




define('EREG_TEXTO_100_OBLIGATORIO','/^.{1,100}$/');
define('EREG_TEXTO_150_OBLIGATORIO','/^.{1,150}$/');



spl_autoload_register(function ($nombre) {

    $nombre = strtolower($nombre);


    if (substr($nombre,-4) == 'crud')
    {
        $nombre_backup = substr($nombre,0,-4);
        $nombre = 'crud';
    }



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
        case 'tabla':          
            require_once "lib/tablas/{$nombre}.php";
        break;
        case 'programabase':
            require_once "lib/proc/programa_base.php";
        break;
        case 'crud':
            require_once "lib/proc/{$nombre_backup}_crud/{$nombre_backup}_crud.php";
        break;
        default:
            require_once "lib/{$nombre}/{$nombre}.php";
        break;
    }


});



function enlace($href,$texto_enlace, $opt=[])
{

    $title   = empty($opt['title'])  ? '' : " data-bs-toggle=\"tooltip\" data-bs-html=\"true\" data-bs-title=\"{$opt['title']}\" ";
    $class   = empty($opt['class'])  ? '' : " class=\"{$opt['class']}\" ";
    $onclick = empty($opt['onclick'])? '' : " onclick=\"{$opt['onclick']}\" ";

    return "<a {$onclick} href=\"{$href}\" {$class} {$title} >{$texto_enlace}</a>";
}