<?php


    class HorarioCRUD extends ProgramaBase
    {
        const LIMITE_SCROLL = 5;

        function __construct()
        {

            //$this->libro = new Libro();


            parent::__construct($this->libro);

        }


        function resultados_busqueda()
        {
            $salida = '';

            $ciclo = new Ciclo();

            $lista_ciclos   = new Select  ('lista_ciclos'    ,['' => ''] + $ciclo->listaCiclos(),['validar' => True,'placeholder' => 'Elige un ciclo']);

            $this->form->cargar($lista_ciclos);


            $salida  = $this->form->pintar(['no_pintar_boton' => True]);
            


            $salida .= $this->cargarHorario($this->form->val['ciclo']);



            $salida .= $this->javascript();

            return $salida;
        }


        function javascript()
        {
            return "
                <script type=\"text/javascript\">
                    console.log(idlista_ciclos);  

                    idlista_ciclos.addEventListener('click', function(e) {
                        
                        if (e.target.value != '')
                        {
                            location.href = '/horario/' + e.target.value  + '/';
                        }

                    });
                            
                </script>
            ";

        }


        function cargarHorario($ciclo)
        {

            $html_horario = '';

            $horario = new Horario();
            $lista_horarios = $horario->cargar($ciclo);


            $html_horario = '
                <table>
                    <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
            ';

            foreach($lista_horarios as $hora => $array_dias)
            {

                $html_horario .= '<tr>';


                $html_horario .= "<td>{$hora}</td>";
                $html_horario .= "<td class=\"horariotd\" style=\"background:#{$array_dias['L']['color']};\">{$array_dias['L']['siglas_modulo']}</td>";
                $html_horario .= "<td class=\"horariotd\" style=\"background:#{$array_dias['M']['color']};\">{$array_dias['M']['siglas_modulo']}</td>";
                $html_horario .= "<td class=\"horariotd\" style=\"background:#{$array_dias['X']['color']};\">{$array_dias['X']['siglas_modulo']}</td>";
                $html_horario .= "<td class=\"horariotd\" style=\"background:#{$array_dias['J']['color']};\">{$array_dias['J']['siglas_modulo']}</td>";
                $html_horario .= "<td class=\"horariotd\" style=\"background:#{$array_dias['V']['color']};\">{$array_dias['V']['siglas_modulo']}</td>";


                $html_horario .= '</tr>';

            }




            $html_horario .= '

                </table>
            
            ';


            return $html_horario;
        }


    }





