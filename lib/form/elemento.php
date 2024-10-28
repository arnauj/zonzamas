<?php



    class Elemento
    {

        public function __construct($name,$opt=[])
        {
            $this->name = $name;

            $this->type = isset($opt['type'])?$opt['type'] : 'text';

            $this->placeholder = $opt['placeholder'];

            $this->lit = Literal::getInstance()->lit;

            $this->disabled = $opt['disabled'];

            $this->validar = $opt['validar'];
            $this->ereg    = $opt['ereg'];


            $this->value = Campo::getInstance()->val[$this->name];

        }

        public function validar()
        {
            $this->error = [];
            $this->error['error'] = False;

            if ($this->validar)
            {
                if(!empty($this->ereg))
                {
                    if(!preg_match($this->ereg,$this->value))
                    {
                        $this->error['error']       = True;
                        $this->error['desc_error']  = '<em class="error_campo_texto">'.  Literal::getInstance()->lit['error_gen'] .'</em> <br />';
                        $this->error['class_error'] = 'error_campo_texto';
                    }
                }
                else
                {
                    if (empty($this->value))
                    {
                        $this->error['error']       = True;
                        $this->error['desc_error']  = '<em class="error_campo_texto">'.  Literal::getInstance()->lit['error_gen'] .'</em> <br />';
                        $this->error['class_error'] = 'error_campo_texto';
                    }
                }

            }


            return $this->error;


        }

        protected function previo_pintar()
        {
            if (!empty($this->placeholder))
                $this->prev_placeholder = "placeholder=\"{$this->placeholder}\"";

            if ($this->disabled)
                $this->prev_disabled = 'disabled="disabled"';
        }

        public function pintar()
        {
            $this->previo_pintar();

            return "
                <label class=\"". $this->error['class_error'] ." form-label\" for=\"{$this->name}\">{$this->lit[$this->name]}:</label>
                <input {$this->prev_disabled} class=\"form-control\" type=\"{$this->type}\" id=\"id{$this->name}\" name=\"{$this->name}\" value=\"{$this->value}\" {$this->prev_placeholder}>
                ". $this->error['desc_error'] ."
                <br />
            ";
        }


    }