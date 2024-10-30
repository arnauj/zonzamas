<?php

    class Select extends Elemento
    {


        public function __construct($name,$opciones,$opt=[])
        {
            parent::__construct($name,$opt);

            $this->options = $opciones;

        }

        public function pintar()
        {
            $this->previo_pintar();


            $html_options = '';
            foreach ($this->options as $code => $valor)
            {
                $html_options .= "<option value=\"{$code}\">{$valor}</option>";
            }


            return "
                <label class=\"". $this->error['class_error'] ." form-label\" for=\"{$this->name}\">{$this->lit[$this->name]}:</label>
                <select {$this->prev_disabled}  class=\"form-control form-select\"  id=\"id{$this->name}\" name=\"{$this->name}\"> 
                    {$html_options}
                </select>
                <br />
            ";
        }


    }