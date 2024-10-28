<?php



    class Textarea extends Elemento
    {

        public function pintar()
        {
            $this->previo_pintar();



            return "
                <label class=\"". $this->error['class_error'] ." form-label\" for=\"{$this->name}\">{$this->lit[$this->name]}:</label>
                <textarea {$this->prev_disabled} class=\"form-control\" id=\"id{$this->name}\" name=\"{$this->name}\" {$this->prev_placeholder}>{$this->value}</textarea>
                ". $this->error['desc_error'] ."
                <br />
            ";
        }


    }