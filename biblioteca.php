<?php

    define('LIMITE_SCROLL', '5');
  
    require_once "general.php";

    class BibliotecaCRUD extends ProgramaBase
    {
        function __construct()
        {
            $this->libro = new Libro();

        }

        function inicializar()
        {
            $this->form->accion('/biblioteca/');

            $paso        = new Hidden('paso'); 
            $paso->value = 1;

            $oper        = new Hidden('oper'); 
            $id          = new Hidden('id');        

            $nombre      = new Input   ('nombre'       ,['placeholder' => 'Nombre del libro...'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
            $descripcion = new Textarea('descripcion',['placeholder' => 'Descripción del libro...', 'validar' => True ]);
            $autor       = new Input   ('autor'      ,['placeholder' => 'Autor del libro...'      , 'validar' => True, 'ereg' => EREG_TEXTO_150_OBLIGATORIO  ]);
            $editorial   = new Select  ('editorial'  ,Libro::EDITORIALES,['validar' => True]);

            $this->form->cargar($paso);
            $this->form->cargar($oper);
            $this->form->cargar($id);

            $this->form->cargar($nombre);
            $this->form->cargar($descripcion);
            $this->form->cargar($autor);
            $this->form->cargar($editorial);
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
                    <li class=\"breadcrumb-item\">". enlace('/biblioteca/','biblioteca',['title' => 'Volver al <b>listado</b>']) ."</li>
                    <li class=\"breadcrumb-item active\" aria-current=\"page\">{$titulo_seccion}</li>
                ";
            }

            

            return "
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb\">
                        <li class=\"breadcrumb-item\">". enlace('','Zonzamas') ."</li>
                        {$breadcrumb}
                    </ol>
                </nav>
            ";
        }


        function formulario($oper,$errores = [])
        {

            $id = $this->form->val['id'];

            $botones_extra = '';
            $mensaje_exito = False;
            if($this->form->val['paso'] && $this->form->cantidad_errores == 0)
            {
                $mensaje_exito = True;
                $botones_extra = enlace('/biblioteca/alta/','Nuevo libro',['class'=> 'btn btn-primary']);

                if($oper == 'update')
                    $botones_extra .= enlace('/biblioteca/actualizar/'.$id,'Editar',['class'=> 'btn btn-primary']);
            
            }

            $html_formulario = $this->form->pintar(['botones_extra' => $botones_extra,'exito' =>  $mensaje_exito]);

            return $html_formulario;

        }

        function existe($id='')
        {

            $cantidad = 0;
            if (   !empty($this->form->val['nombre']) 
                && !empty($this->form->val['descripcion'])
                && !empty($this->form->val['autor'])
                && !empty($this->form->val['editorial'])
            )
            {   

                $cantidad = $this->libro->existeLibro(
                    $this->form->val['nombre']
                ,$this->form->val['descripcion']
                ,$this->form->val['autor']
                ,$this->form->val['editorial']
                ,$this->form->val['id']
                );
            }

            return $cantidad;
        }


        function eliminar()
        {

            $this->libro->id = $this->form->val['id'];

            $this->libro->eliminar();

        }

        function recuperar()
        {

            $this->libro->recuperar($this->form->val['id']);



            $this->form->elementos['nombre']->value        = $this->libro->nombre;
            $this->form->elementos['descripcion']->value = $this->libro->descripcion;
            $this->form->elementos['autor']->value       = $this->libro->autor;
            $this->form->elementos['editorial']->value   = $this->libro->editorial;
        }

        function actualizar()
        {

            if (!empty($this->form->val['id']))
            {
                $this->libro->inicializar($this->form->val);

                $this->libro->actualizar();
            }
        }


        function insertar()
        {

            $this->libro->inicializar($this->form->val);

            $this->libro->insertar();
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

            $pagina = $this->form->val['pagina'];

            $offset = $pagina * $limite;



            $opt = [];
    
            $opt['orderby']['fecha_ult_mod'] = 'DESC';   
            $opt['offset'] = $offset;
            $opt['limit']  = $limite;
        
        
            $resultado = $this->libro->seleccionar($opt);

            if ($resultado->num_rows > 0) 
            {
                while ($fila = $resultado->fetch_assoc()) 
                {

                    
                    

                    $listado_libros .= "
                        <tr>
                            <th scope=\"row\">
                                ". enlace("/biblioteca/actualizar/{$fila['id']}",'Actualizar',['class' => 'btn btn-primary']) ."
                                ". enlace("#",'Eliminar',['class' => 'btn btn-danger','onclick' => "if(confirm('Cuidado, estás tratando de eliminar el libro: {$fila['nombre']}')) location.href = '/biblioteca/eliminar/{$fila['id']}';"]) ."
                            </th>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['descripcion']}</td>
                            <td>{$fila['autor']}</td>
                            <td>". Libro::EDITORIALES[$fila['editorial']] ."</td>
                        </tr>
                    ";
                }
            } 
            else 
            {
                $listado_libros = '<tr><td colspan="5">No hay resultados</td></tr>';
            }

            if($pagina)
                $pagina_anterior = '<li class="page-item">'. enlace('/biblioteca/pag/'. ($pagina - 1), 'Anterior',['class' => 'page-link']) .'</li>';
            

            $listado_libros .= '
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        '. $pagina_anterior .'
                        <li class="page-item">'. enlace('/biblioteca/pag/'. ($pagina + 1), 'Siguiente',['class' => 'page-link']) .'</li>
                    </ul>
                </nav>


                <div class="alta">'. enlace('/biblioteca/alta/', 'Alta de libro',['class' => 'btn btn-success']) .'</div>
            ';
            

            return $listado_libros;


        }
    }


    $biblioteca = new BibliotecaCRUD();

    echo $biblioteca->main();

?>





