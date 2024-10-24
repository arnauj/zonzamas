<?php



    class Campo
    {
        //instancia única
        private static $instance;

        public $val = [];

        public function __construct()
        {
            $this->compruebaVariable($_GET);
            $this->compruebaVariable($_POST);
            $this->compruebaVariable($_COOKIE);
        }

        private function compruebaVariable($global)
        {
            foreach($global as $code => $valor)
            {
                $this->existeInyeccion($valor)?exit(0): $this->val[$code] = $valor;               
            }
        }


        private function existeInyeccion($valor)
        {

            return preg_match('/SELECT.+FROM|UPDATE.+SET|INSERT INTO|DELETE.+FROM/i',$valor);

        }


        static public function getInstance()
        {

            if (empty(self::$instance))
            {
                self::$instance = new self();
            }

            return self::$instance;
        }

    }