<?php


    require_once "general.php";




    echo Plantilla::header("CIFP Zonzamas");


    define('TEXTO_ERROR', '<em class="error_campo_texto">El campo es inválido</em> <br />');

    define('EDITORIALES', ['AY' => 'Anaya', 'ST' => 'Santillana']);

    define('LIMITE_SCROLL', '5');

    $html_salida = '';


    $oper = $_REQUEST['oper'];

    $errores = [];

    switch($oper)
    {
        case 'create':

            if (!empty($_POST['paso']))
            {
                $errores = validar_campos();

                if(count($errores) == 0)
                {
                    insertar();

                }
            }


            $html_salida .= cabecera('alta');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'update':

            if (empty($_POST['paso']))
            {
                //Cargar los datos
                recuperar();
            }
            else
            {
                $errores = validar_campos();

                if(count($errores) == 0)
                {
                    actualizar();
                }
            }

            $html_salida .= cabecera('actualizar');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'delete':
            eliminar();

            header("location: /biblioteca.php");
            exit(0);

        break;
        default:

            $html_salida .= cabecera();

            $html_salida .= resultados_busqueda();
            

        break;
    }



    function validar_campos()
    {
        $errores = [];

        $campos = ['nombre', 'descripcion', 'autor', 'editorial'];


        foreach($campos as $campo)
        {
            if(empty($_POST[$campo]))
            {
                $errores[$campo]['error']       = True;
                $errores[$campo]['desc_error']  = TEXTO_ERROR;
                $errores[$campo]['class_error'] = 'error_campo_texto';
            }
        }



        return $errores;

    }


    function cabecera($titulo_seccion='')
    {
        if(empty($titulo_seccion))
        {
            $breadcrumb = "<li class=\"breadcrumb-item\">biblioteca</li>";
        }
        else
        {
            $breadcrumb = "
                <li class=\"breadcrumb-item\"><a href=\"/biblioteca.php\">biblioteca</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">{$titulo_seccion}</li>
            ";
        }


        return "
            <nav aria-label=\"breadcrumb\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"/\">Zonzamas</a></li>
                    {$breadcrumb}
                </ol>
            </nav>
        ";
    }


    function formulario($oper,$errores = [])
    {


        $id = $_REQUEST['id'];

        $mensaje_exito = $botones_extra = $disabled = '';
        if($_POST['paso'] && count($errores) == 0)
        {
            $mensaje_exito = '<div class="exito">Operación realizada con éxito</div>';
            $disabled = 'disabled';
            $botones_extra = '<a href="/biblioteca.php?oper=create" class="btn btn-primary">Nuevo libro</a>';

            if($oper == 'update')
                $botones_extra .= ' <a href="/biblioteca.php?oper=update&id='. $id .'" class="btn btn-primary">Editar</a>';
        
        }

        $value_editoriales = '';
        foreach(EDITORIALES as $cod_editorial => $texto_editorial)
        {
            $value_editoriales .= "<option value=\"{$cod_editorial}\">{$texto_editorial}</option>";
        }

        $html_formulario = "

            <form method=\"POST\" action=\"biblioteca.php\">
                <input type=\"hidden\" name=\"paso\" value=\"1\" />
                <input type=\"hidden\" name=\"oper\" value=\"{$oper}\" />
                <input type=\"hidden\" name=\"id\" value=\"{$id}\" />

                {$mensaje_exito}

                <label class=\"". $errores['nombre']['class_error'] ." form-label\" for=\"nombre\">Nombre:</label>
                <input {$disabled} class=\"form-control\" type=\"text\" id=\"nombre\" name=\"nombre\" value=\"{$_POST['nombre']}\" placeholder=\"Nombre del libro...\">
                ". $errores['nombre']['desc_error'] ."
                <br />

                <label class=\"". $errores['descripcion']['class_error'] ." form-label\" for=\"descripcion\">Descripción:</label>
                <textarea {$disabled} class=\"form-control\" id=\"descripcion\" name=\"descripcion\" placeholder=\"Descripción del libro...\">{$_POST['descripcion']}</textarea>
                ". $errores['descripcion']['desc_error'] ."
                <br />

                <label class=\"". $errores['autor']['class_error'] ." form-label\" for=\"autor\">Autor:</label>
                <input {$disabled} class=\"form-control\" type=\"text\" id=\"autor\" name=\"autor\" value=\"{$_POST['autor']}\" placeholder=\"Autor del libro...\"> 
                ". $errores['autor']['desc_error'] ."
                <br />

                <label class=\"". $errores['editorial']['class_error'] ." form-label\" for=\"editorial\">Editorial:</label>
                <select {$disabled}  class=\"form-control form-select\"  id=\"editorial\" name=\"editorial\"> 
                    {$value_editoriales}
                </select>
                ". $errores['editorial']['desc_error'] ."
                <br />

                <div style=\"text-align:right\">
                    {$botones_extra}
                    <input {$disabled} type=\"submit\" class=\"btn btn-primary\" value=\"Enviar\" />
                </div>
                

            </form>
        
        ";

        return $html_formulario;




    }

    function eliminar()
    {

        if (!empty($_GET['id']))
        {
            $sql = "
                DELETE FROM libros
                WHERE id = '{$_GET['id']}'
            ";
            $resultado = BBDD::query($sql);
        }
    }

    function recuperar()
    {
        $id =  $_REQUEST['id'];

        $sql = "
            SELECT * 
            FROM   libros
            WHERE  id = '{$id}'
        ";

        $resultado = BBDD::query($sql);


        $fila = $resultado->fetch_assoc();


        $_POST['nombre']      = $fila['nombre'];
        $_POST['descripcion'] = $fila['descripcion'];
        $_POST['autor']       = $fila['autor'];
        $_POST['editorial']   = $fila['editorial'];

    }

    function actualizar()
    {
        if (!empty($_POST['id']))
        {
            $sql = "
                UPDATE libros

                SET    nombre      = '{$_POST['nombre']}'
                    ,descripcion = '{$_POST['descripcion']}'
                    ,autor       = '{$_POST['autor']}'
                    ,editorial   = '{$_POST['editorial']}'

                    ,ip_ult_mod   = '{$_SERVER['REMOTE_ADDR']}'

                WHERE id = '{$_POST['id']}'

            ";
            $resultado = BBDD::query($sql);
        }
    }


    function insertar()
    {
        $sql = "
            INSERT INTO libros
            (
                nombre
               ,descripcion
               ,autor
               ,editorial
               ,ip_alta
            )
            VALUES
            (   
                 '". $_POST['nombre'] ."'
                ,'". $_POST['descripcion'] ."'
                ,'". $_POST['autor'] ."'
                ,'". $_POST['editorial'] ."'

                ,'". $_SERVER['REMOTE_ADDR'] ."'
            );
        ";

        $resultado = BBDD::query($sql);
    }



    function resultados_busqueda()
    {
        $listado_libros = '
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Editorial</th>
                </tr>
            </thead>
            <tbody>
        
        ';

        $limite = LIMITE_SCROLL;

        $pagina = $_GET['pagina'];

        $offset = $pagina * $limite;

        $sql = "SELECT * FROM libros LIMIT {$limite} OFFSET {$offset}";

        $resultado = BBDD::query($sql);

        if ($resultado->num_rows > 0) 
        {
            while ($fila = $resultado->fetch_assoc()) 
            {

                $listado_libros .= "
                    <tr>
                        <th scope=\"row\">
                            <a href=\"/biblioteca.php?oper=update&id={$fila['id']}\" class=\"btn btn-primary\">Actualizar</a>
                            <a onclick=\"if(confirm('Cuidado, estás tratando de eliminar el libro: {$fila['nombre']}')) location.href = '/biblioteca.php?oper=delete&id={$fila['id']}';\" class=\"btn btn-danger\">Eliminar</a>
                        </th>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['descripcion']}</td>
                        <td>{$fila['autor']}</td>
                        <td>". EDITORIALES[$fila['editorial']] ."</td>
                    </tr>
                ";
            }
        } 
        else 
        {
            $listado_libros = '<tr><td colspan="5">No hay resultados</td></tr>';
        }

        if($pagina)
            $pagina_anterior = '<li class="page-item"><a class="page-link" href="/biblioteca.php?pagina='. ($pagina - 1) .'"">Anterior</a></li>';

        $listado_libros .= '
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    '. $pagina_anterior .'
                    <li class="page-item"><a class="page-link" href="/biblioteca.php?pagina='. ($pagina + 1) .'">Siguiente</a></li>
                </ul>
            </nav>


            <div class="alta">
                <a href="/biblioteca.php?oper=create" class="btn btn-success">Alta de libro</a>
            </div>
        ';


        return $listado_libros;


    }


?>





    
    <div class="container">

    <?php echo $html_salida; ?>

    </div>
    <br />
<?php

    echo Plantilla::footer();

?>