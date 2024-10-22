<?php

spl_autoload_register(function ($nombre) {

    $nombre = strtolower($nombre);

    require_once "lib/{$nombre}/{$nombre}.php";
});