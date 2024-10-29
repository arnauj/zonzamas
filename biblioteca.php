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
                    
                    insertar();
                    $form->activeDisable();
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
                    actualizar();
                    $form->activeDisable();
                }
            }

            $html_salida .= cabecera('actualizar');
            $html_salida .= formulario($oper,$errores);

        break;
        case 'delete':

            eliminar();

            ob_clean();

            header("location: /biblioteca.php");
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

        $form->accion('biblioteca.php');

        $paso        = new Hidden('paso'); 
        $paso->value = 1;

        $oper        = new Hidden('oper'); 
        $id          = new Hidden('id');        

        $nombre      = new Input   ('name'       ,['placeholder' => 'Nombre del libro...'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
        $descripcion = new Textarea('description',['placeholder' => 'Descripción del libro...', 'validar' => True ]);
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
        $form = Form::getInstance();

        $id = $form->val['id'];

        $botones_extra = '';
        $mensaje_exito = False;
        if($form->val['paso'] && $form->cantidad_errores == 0)
        {
            $mensaje_exito = True;
            $botones_extra = '<a href="/biblioteca.php?oper=create" class="btn btn-primary">Nuevo libro</a>';

            if($oper == 'update')
                $botones_extra .= ' <a href="/biblioteca.php?oper=update&id='. $id .'" class="btn btn-primary">Editar</a>';
        
        }

        $html_formulario = $form->pintar(['botones_extra' => $botones_extra,'exito' =>  $mensaje_exito]);


        /*
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
        */

        return $html_formulario;




    }

    function eliminar()
    {

        $id = Form::getInstance()->val['id'];

        if (!empty($id))
        {
            $sql = "
                DELETE FROM libros
                WHERE id = '{$id}'
            ";
            $resultado = BBDD::query($sql);
        }
    }

    function recuperar()
    {
        $form = Form::getInstance();

        $id =  $form->val['id'];

        $sql = "
            SELECT * 
            FROM   libros
            WHERE  id = '{$id}'
        ";

        $resultado = BBDD::query($sql);


        $fila = $resultado->fetch_assoc();


        $form->elementos['name']->value        = $fila['nombre'];
        $form->elementos['description']->value = $fila['descripcion'];
        $form->elementos['autor']->value       = $fila['autor'];
        $form->elementos['editorial']->value   = $fila['editorial'];
    }

    function actualizar()
    {

        $form = Form::getInstance();

        if (!empty($form->val['id']))
        {
            $sql = "
                UPDATE libros

                SET  nombre      = '{$form->val['name']}'
                    ,descripcion = '{$form->val['description']}'
                    ,autor       = '{$form->val['autor']}'
                    ,editorial   = '{$form->val['editorial']}'

                    ,ip_ult_mod   = '{$_SERVER['REMOTE_ADDR']}'
                    ,fecha_ult_mod = CURRENT_TIMESTAMP

                WHERE id = '{$form->val['id']}'

            ";
            $resultado = BBDD::query($sql);
        }
    }


    function insertar()
    {
        $form = Form::getInstance();

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
                 '". $form->val['name'] ."'
                ,'". $form->val['description'] ."'
                ,'". $form->val['autor'] ."'
                ,'". $form->val['editorial'] ."'

                ,'". $_SERVER['REMOTE_ADDR'] ."'
            );
        ";

        $resultado = BBDD::query($sql);
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