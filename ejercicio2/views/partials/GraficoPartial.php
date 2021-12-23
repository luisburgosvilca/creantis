<?php

class GraficoPartial
{
    public function MostrarGrafico()
    {

        $numero = $_POST['numero'];
        for ( $i=0; $i < $numero ;$i++){
            for ($j=0;  $j<$numero;$j++){

                $dibujo[$i][$j] = "_";
                $dibujo[$i][$i] = "X";
                $dibujo[$i][$numero - $i - 1] = "X";
            }
        }

        ?>
        <style type="text/css">
             section> p{letter-spacing: 40px;}
        </style>

        <section>
        <?php
        for ( $i=0; $i < $numero ;$i++){
            echo "<p>";
            for ($j=0;  $j<$numero;$j++){
            echo $dibujo[$i][$j];
            }
            echo "</p>";
        }
        ?>
        </section>

        <?php

    }
}

?>