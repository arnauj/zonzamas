<?php


    class Form
    {
        //instancia única
        private static $instance;


        public $elementos = [];

        public $cantidad_errores;

        public $disabled;

        public $duplicado;


        function __construct()
        {
            $this->val = Campo::getInstance()->val;

            $this->cantidad_errores = 0;

            $this->disabled = False;
            $this->duplicado = False;
        

        }

        public function accion($ruta)
        {
            $this->accion = $ruta;
        }

        public function cargar($elemento)
        {
            $this->elementos[$elemento->name] = $elemento;
        }


        public function activeDisable()
        {
            $this->disabled = True;
            foreach($this->elementos as $ind => $elemento)
            {
                $elemento->disabled = True;
            }
        }

        static public function getInstance()
        {

            if (empty(self::$instance))
            {
                self::$instance = new self();
            }

            return self::$instance;
        }



        public function validar()
        {
            $this->errores = [];

            foreach($this->elementos as $ind => $elemento)
            {
                $this->errores[$elemento->name] = $elemento->validar();

                if($this->errores[$elemento->name]['error'])
                    $this->cantidad_errores++;

            }

            return $this->errores;
        }


        public function pintar($opt=[])
        {
            $botones_extra = $opt['botones_extra'];
            $disabled      = $this->disabled ? ' disabled="disabled" ' : '';

            if($this->duplicado)
                $mensaje_final = '<div class="mensaje_error">Hay un registro duplicado en BBDD</div>';
            else
                $mensaje_final = $opt['exito']? '<div class="exito">Operación realizada con éxito</div>' : '';

            $texto_enviar = Literal::getInstance()->lit['enviar'];

            $html_elementos = '';
            foreach($this->elementos as $ind => $elemento)
            {
                $html_elementos .= $elemento->pintar();
            }

            return "
                <form method=\"POST\" action=\"{$this->accion}\">
                    {$mensaje_final}
                    {$html_elementos}
                    
                    <div style=\"text-align:right\">
                        {$botones_extra}
                        <input {$disabled} type=\"submit\" class=\"btn btn-primary\" value=\"{$texto_enviar}\" />
                    </div>
                </form>
            ";

        }

    }