<?php


    class Form
    {
        //instancia única
        private static $instance;


        public $elementos = [];


        function __construct()
        {
            $this->val = Campo::getInstance()->val;
        

        }

        public function accion($ruta)
        {
            $this->accion = $ruta;
        }

        public function cargar($elemento)
        {
            $this->elementos[$elemento->name] = $elemento;
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
            }

            return $this->errores;
        }


        public function pintar($opt=[])
        {
            $botones_extra = $opt['botones_extra'];
            $disabled      = $opt['disabled'];

            $texto_enviar = Literal::getInstance()->lit['enviar'];

            $html_elementos = '';
            foreach($this->elementos as $ind => $elemento)
            {
                $html_elementos .= $elemento->pintar();
            }

            return "
                <form method=\"POST\" action=\"{$this->accion}\">
                    {$html_elementos}
                    <div style=\"text-align:right\">
                        {$botones_extra}
                        <input {$disabled} type=\"submit\" class=\"btn btn-primary\" value=\"{$texto_enviar}\" />
                    </div>
                </form>
            ";

        }

    }