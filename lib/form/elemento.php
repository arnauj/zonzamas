<?php



    class Elemento
    {

        public function __construct($name,$opt=[])
        {
            $this->name = $name;

            $this->type = isset($opt['type'])?$opt['type'] : 'text';

            $this->placeholder = $opt['placeholder'];

            $this->lit = Literal::getInstance()->lit;

        }


        public function pintar()
        {
            if (!empty($this->placeholder))
                $placeholder = "placeholder=\"{$this->placeholder}\"";


            return "
                <label class=\"". $errores[$this->name]['class_error'] ." form-label\" for=\"{$this->name}\">{$this->lit[$this->name]}:</label>
                <input {$disabled} class=\"form-control\" type=\"{$this->type}\" id=\"id{$this->name}\" name=\"{$this->name}\" value=\"{$_POST['nombre']}\" {$placeholder}>
                ". $errores[$this->name]['desc_error'] ."
                <br />
            ";
        }


    }