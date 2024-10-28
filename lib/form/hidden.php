<?php



    class Hidden extends Elemento
    {

        public function pintar()
        {
            return "
                <input type=\"hidden\" name=\"{$this->name}\" value=\"{$this->value}\" />
            ";
        }


    }