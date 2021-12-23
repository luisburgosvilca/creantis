<?php 

    class MainController
    {
        public function MainControllerIndex()
        {
            include_once('views/MainView.php');
            $MainView = new MainView();
            $MainView -> MostrarMainView();
        }

        public function GenerarGrafico()
        {
            include_once('views/partials/GraficoPartial.php');
            $GraficoPartial = new GraficoPartial();
            $GraficoPartial -> MostrarGrafico();
        }
    }


?>