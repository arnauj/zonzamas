<?php



    class Libro extends Tabla
    {
        const TABLA = 'libros';

        function __construct()
        {
            parent::__construct(self::TABLA);

        }
    }