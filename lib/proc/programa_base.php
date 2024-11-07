<?php
   
    class ProgramaBase
    {

        function main()
        {
            ob_start();

            $this->form = Form::getInstance();                
        
            $oper = $this->form->val['oper'];
        
            $errores = [];
        
            switch($oper)
            {
                case 'create':
        
        
                    $this->inicializar();
        
                    if (!empty($this->form->val['paso']))
                    {
                        $errores = $this->form->validar();
        
        
        
                        if(!$this->form->cantidad_errores)
                        {
                            if(!$this->existe())
                            {
                                $this->insertar();
                                $this->form->activeDisable();
                            }
                            else
                            {
                                $this->form->duplicado = True;
                            }
        
                        }
                    }
        
        
                    $html_salida .= $this->cabecera('alta');
                    $html_salida .= $this->formulario($oper,$errores);
        
                break;
                case 'update':
        
                    $this->inicializar();
        
                    if (empty($this->form->val['paso']))
                    {
                        //Cargar los datos
                        $this->recuperar();
                    }
                    else
                    {
                        $errores = $this->form->validar();
        
                        if(!$this->form->cantidad_errores)
                        {
                            if (!$this->existe($this->form->val['id']))
                            {
                                $this->actualizar();
                                $this->form->activeDisable();
                            }
                            else
                            {
                                $this->form->duplicado = True;
                            }
                        }
        
                    }
        
                    $html_salida .= $this->cabecera('actualizar');
                    $html_salida .= $this->formulario($oper,$errores);
        
                break;
                case 'delete':
        
                    $this->eliminar();
        
                    ob_clean();

                    header("location: /". explode('/',$_SERVER['REQUEST_URI'])[1] ."/");
                    exit(0);
        
                break;
                default:
        
                    $html_salida .= $this->cabecera();
        
                    $html_salida .= $this->resultados_busqueda();
                    
        
                break;
            }
            

            $html_salida = 
                  Plantilla::header("CIFP Zonzamas")
                ."<div class=\"container\">{$html_salida}</div><br />"
                . Plantilla::footer()
            ;

            return $html_salida;

        }
        

    }