<?php

    require_once "general.php";

    echo Plantilla::cargarSeccion(Form::getInstance()->val['seccion']);
