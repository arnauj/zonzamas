<?php


    require_once "general.php";

    ob_start();


    $form = Form::getInstance();

    echo Plantilla::header("CIFP Zonzamas");

    define('EDITORIALES', ['AY' => 'Anaya', 'ST' => 'Santillana']);

    define('LIMITE_SCROLL', '5');

    $html_salida = '';


    $oper = $_REQUEST['oper'];

    $errores = [];

    switch($oper)
    {
        case 'create':


            inicializar();

            if (!empty($form->val['paso']))
            {
                $errores = $form->validar();



                if(!$form->cantidad_errores)
                {
                    if(!existeLibro())
                    {
                        insertar();
                        $form->activeDisable();
                    }
                    else
                    {
                        $form->duplicado = True;
                    }

                }
            }


            $html_salida .= cabecera('alta');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'update':

            inicializar();

            if (empty($form->val['paso']))
            {
                //Cargar los datos
                recuperar();
            }
            else
            {
                $errores = $form->validar();

                if(!$form->cantidad_errores)
                {
                    if (!existeLibro($form->val['id']))
                    {
                        actualizar();
                        $form->activeDisable();
                    }
                    else
                    {
                        $form->duplicado = True;
                    }
                }

            }

            $html_salida .= cabecera('actualizar');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'delete':

            eliminar();

            ob_clean();

            header("location: /biblioteca/");
            exit(0);

        break;
        default:

            $html_salida .= cabecera();

            $html_salida .= resultados_busqueda();
            

        break;
    }

    function inicializar()
    {
        $form = Form::getInstance();

        $form->accion('/biblioteca/');

        $paso        = new Hidden('paso'); 
        $paso->value = 1;

        $oper        = new Hidden('oper'); 
        $id          = new Hidden('id');        

        $nombre      = new Input   ('nombre'       ,['placeholder' => 'Nombre del libro...'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
        $descripcion = new Textarea('descripcion',['placeholder' => 'Descripción del libro...', 'validar' => True ]);
        $autor       = new Input   ('autor'      ,['placeholder' => 'Autor del libro...'      , 'validar' => True, 'ereg' => EREG_TEXTO_150_OBLIGATORIO  ]);
        $editorial   = new Select  ('editorial'  ,EDITORIALES,['validar' => True]);

        $form->cargar($paso);
        $form->cargar($oper);
        $form->cargar($id);

        $form->cargar($nombre);
        $form->cargar($descripcion);
        $form->cargar($autor);
        $form->cargar($editorial);
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
                <li class=\"breadcrumb-item\"><a href=\"/biblioteca/\">biblioteca</a></li>
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
        $form = Form::getInstance();

        $id = $form->val['id'];

        $botones_extra = '';
        $mensaje_exito = False;
        if($form->val['paso'] && $form->cantidad_errores == 0)
        {
            $mensaje_exito = True;
            $botones_extra = '<a href="/biblioteca/alta/" class="btn btn-primary">Nuevo libro</a>';

            if($oper == 'update')
                $botones_extra .= ' <a href="/biblioteca/actualizar/'. $id .'" class="btn btn-primary">Editar</a>';
        
        }

        $html_formulario = $form->pintar(['botones_extra' => $botones_extra,'exito' =>  $mensaje_exito]);

        return $html_formulario;

    }

    function existeLibro($id='')
    {
        $form = Form::getInstance();


        if (   !empty($form->val['nombre']) 
            && !empty($form->val['descripcion'])
            && !empty($form->val['autor'])
            && !empty($form->val['editorial'])
        )
        {
            $andid = '';
            if (!empty($id))
                $andid = "AND id <> '{$id}' ";


            $sql = "
                SELECT nombre
                FROM   libros
                WHERE  nombre      = '{$form->val['nombre']}'
                AND    descripcion = '{$form->val['descripcion']}'
                AND    autor       = '{$form->val['autor']}'
                AND    editorial   = '{$form->val['editorial']}'
                {$andid}
            ";

            $resultado = BBDD::query($sql);
        }

        return $resultado->num_rows;
    }


    function eliminar()
    {
        $libro = new Libro();

        $libro->id = Form::getInstance()->val['id'];

        $libro->eliminar();

    }

    function recuperar()
    {


        $form = Form::getInstance();

        $libro = new Libro();

        $libro->recuperar($form->val['id']);



        $form->elementos['nombre']->value        = $libro->nombre;
        $form->elementos['descripcion']->value = $libro->descripcion;
        $form->elementos['autor']->value       = $libro->autor;
        $form->elementos['editorial']->value   = $libro->editorial;
    }

    function actualizar()
    {

        $form = Form::getInstance();

        if (!empty($form->val['id']))
        {
            $libro = new Libro();
            $libro->inicializar($form->val);

            $libro->actualizar();
        }
    }


    function insertar()
    {
        $form = Form::getInstance();

        $libro = new Libro();
        $libro->inicializar($form->val);

        $libro->insertar();
    }



    function resultados_busqueda()
    {
        $form = Form::getInstance();

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

        $pagina = $form->val['pagina'];

        $offset = $pagina * $limite;

        $sql = "SELECT * FROM libros ORDER BY fecha_ult_mod DESC LIMIT {$limite} OFFSET {$offset} ";

        $resultado = BBDD::query($sql);

        if ($resultado->num_rows > 0) 
        {
            while ($fila = $resultado->fetch_assoc()) 
            {

                $listado_libros .= "
                    <tr>
                        <th scope=\"row\">
                            <a href=\"/biblioteca/actualizar/{$fila['id']}\" class=\"btn btn-primary\">Actualizar</a>
                            <a onclick=\"if(confirm('Cuidado, estás tratando de eliminar el libro: {$fila['nombre']}')) location.href = '/biblioteca/eliminar/{$fila['id']}';\" class=\"btn btn-danger\">Eliminar</a>
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
            $pagina_anterior = '<li class="page-item"><a class="page-link" href="/biblioteca/pag/'. ($pagina - 1) .'"">Anterior</a></li>';

        $listado_libros .= '
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    '. $pagina_anterior .'
                    <li class="page-item"><a class="page-link" href="/biblioteca/pag/'. ($pagina + 1) .'">Siguiente</a></li>
                </ul>
            </nav>


            <div class="alta">
                <a href="/biblioteca/alta/" class="btn btn-success">Alta de libro</a>
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