<?php


    $nombre = $email = $edad =  '';

    $error_nombre = $error_email =  $error_edad = False;


    $errores = $hola_nombre= '';
    if(!empty($_POST['paso']))
    {


        if (empty($_POST['nombre']))
        {
            $errores = "<span class=\"error\">¡ERROR! No se ha enviado ningún nombre.<br /></span>";
            $error_nombre = True;
        }
        else if(strlen($_POST['nombre']) < 5)
        {
            $errores = "<span class=\"error\">¡ERROR! El número de caracteres de nombre, es menor a 5.<br /></span>";
            $error_nombre = True;
        }

        if (empty($_POST['email']))
        {
            $errores .= "<span class=\"error\">¡ERROR! No se ha enviado ningún E-mail.<br /></span>";
            $error_email = True;
        }

        if (empty($_POST['edad']))
        {
            $errores .= "<span class=\"error\">¡ERROR! No se ha enviado la Edad.<br /></span>";
            $error_edad = True;
        }
            

        
        if (empty($errores))
        {
            //$hola_nombre = '<span class="ok">Hola ' . $_POST['nombre'] .'</span>';
            $hola_nombre = "<span class=\"ok\">Hola {$_POST['nombre']}</span>";
        }
        else
        {
            if ($error_nombre)
                $error_nombre = 'error_nombre';

            if ($error_email)
                $error_email = 'error_email';

            if ($error_edad)
                $error_edad = 'error_edad';

        }

        $nombre = $_POST['nombre'];
        $email  = $_POST['email'];
        $edad   = $_POST['edad'];
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de envío</title>
    <style type="text/css">

        .error_nombre, .error_email, .error_edad{

            color:#ff0000;
            font-weight:bold;
        }

        .error, .ok{
            font-weight:bold;
            color:#fff;
        }
        .error{
            background:#ff0000;
        }
        .ok{
            background:#00ff00;
        }

        .campo{
            clear:both;
            padding: 5px 0;
        }

        .campo > label, .campo > input{
            float:left;
        }

        .campo > label{
            width: 70px;
            display:block;

        }


    </style>
</head>
<body>
    <form action="formulario.php" method="POST">
        <input type="hidden" name="paso" value="1" />
        <? echo $errores; ?>

        <div class="campo">
            <label class="<? echo $error_nombre; ?>" for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<? echo $nombre; ?>" placeholder="Nombre de la persona..."> 
        </div>  
        
        <div class="campo">
            <label class="<? echo $error_email; ?>" for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<? echo $email; ?>" placeholder="E-mail..."> 
        </div>
        <div class="campo">
            <label class="<? echo $error_edad; ?>" for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="<? echo $edad; ?>" placeholder="Introduce tu edad..."> 
        </div>
        
        <div class="campo">
            <input type="submit">
        </div>
        
        

        
        
        
    </form>
    <?php echo $hola_nombre; ?>
</body>
</html>