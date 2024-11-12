<?php


    class BibliotecaCRUD extends ProgramaBase
    {
        const LIMITE_SCROLL = 5;

        function __construct()
        {

            $this->libro = new Libro();


            parent::__construct($this->libro);

        }

        function inicializar()
        {
            $this->form->accion('/'. $this->seccion .'/');

            $paso        = new Hidden('paso'); 
            $paso->value = 1;

            $oper        = new Hidden('oper'); 
            $id          = new Hidden('id');        

            $nombre      = new Input   ('nombre'       ,['placeholder' => 'Nombre del libro...'     , 'validar' => True, 'ereg' => EREG_TEXTO_100_OBLIGATORIO  ]);
            $descripcion = new Textarea('descripcion'  ,['placeholder' => 'Descripción del libro...', 'validar' => True ]);
            $autor       = new Input   ('autor'        ,['placeholder' => 'Autor del libro...'      , 'validar' => True, 'ereg' => EREG_TEXTO_150_OBLIGATORIO  ]);
            $editorial   = new Select  ('editorial'    ,Libro::EDITORIALES,['validar' => True]);

            $this->form->cargar($paso);
            $this->form->cargar($oper);
            $this->form->cargar($id);
            $this->form->cargar($nombre);
            $this->form->cargar($descripcion);
            $this->form->cargar($autor);
            $this->form->cargar($editorial);
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


        function recuperar()
        {

            $this->libro->recuperar($this->form->val['id']);



            $this->form->elementos['nombre']->value      = $this->libro->nombre;
            $this->form->elementos['descripcion']->value = $this->libro->descripcion;
            $this->form->elementos['autor']->value       = $this->libro->autor;
            $this->form->elementos['editorial']->value   = $this->libro->editorial;
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

            $limite = BibliotecaCrud::LIMITE_SCROLL;

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
                                ". enlace("/{$this->seccion}/actualizar/{$fila['id']}",'Actualizar',['class' => 'btn btn-primary']) ."
                                ". enlace("#",'Eliminar',['class' => 'btn btn-danger','onclick' => "if(confirm('Cuidado, estás tratando de eliminar el libro: {$fila['nombre']}')) location.href = '/biblioteca/eliminar/{$fila['id']}';"]) ."
                            </th>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['descripcion']}</td>
                            <td>{$fila['autor']}</td>
                            <td>". Libro::EDITORIALES[$fila['editorial']] ."</td>
                        </tr>
                    ";
                }

                if ($resultado->num_rows == BibliotecaCRUD::LIMITE_SCROLL)
                    $siguiente = '<li class="page-item">'. enlace("/{$this->seccion}/pag/". ($pagina + 1), 'Siguiente',['class' => 'page-link']) .'</li>';
            } 
            else 
            {
                $listado_libros = '<tr><td colspan="5">No hay resultados</td></tr>';
            }

            if($pagina)
                $pagina_anterior = '<li class="page-item">'. enlace("/{$this->seccion}/pag/". ($pagina - 1), 'Anterior',['class' => 'page-link']) .'</li>';
            

            $listado_libros .= '
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        '. $pagina_anterior .'
                        '. $siguiente .'
                    </ul>
                </nav>


                <div class="alta">'. enlace("/{$this->seccion}/alta/", 'Alta de libro',['class' => 'btn btn-success']) .'</div>
            ';
            

            return $listado_libros;


        }
    }





