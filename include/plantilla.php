<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" />
    <meta name="author" content="El Colegio de San Luis - UTIC" />
    <meta name="theme-color" content="#ffffff" />
    <title>El Colegio de San Luis :: Apps</title>
    <!-- Loading Indicator -->
    <!-- <script src="assets/js/pace.min.js"></script> -->
    <!-- <link href="assets/css/pace.css" rel="stylesheet" /> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.css"> -->
    <link rel="stylesheet" type="text/css" href="./assets/css/fomantic.css">
    <link rel="stylesheet" href="assets/plugins/datatable/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/semantic.amazon.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/custom.css"> -->
</head>

<body id="root">
    <div class="ui red-colsan inverted top attached tiny menu">
        <a class="item pizzabars"><i class="fas fa-bars"></i>&nbsp;Menu</a>
        <span class="item"><img src="/img/Logo.png"></span>

        <?php

        if (isset($_GET["ruta"])) {
            # code...
        }
        
        ?>
        <a class="item<?php if(empty($_GET) || $_GET["ruta"] == "inicio") { echo " active"; } else { " inactive"; } ?>" href="index.php?ruta=inicio">Inicio</a>
        

        <a class="item<?php if(isset($_GET["ruta"]) && $_GET["ruta"] == "convenios") { echo " active"; } else { " inactive"; } ?>" href="index.php?ruta=convenios">Convenios</a>
        <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "contratos") { echo " active"; } else { " inactive"; } ?>" href="index.php?ruta=contratos">Proyectos financiados</a>
        
        <div class="ui dropdown item">
            Indices <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "catalogos") { echo " active"; } else { ""; } ?>" href="index.php?ruta=catalogos">Catalogos</a>
                <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "instituciones") { echo " active"; } else { " "; } ?>" href="index.php?ruta=instituciones">Instituciones / Contraparte</a>
                <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "usuarios") { echo " active"; } else { " "; } ?>" href="index.php?ruta=usuarios">Usuarios / Responsables</a>
            </div>
        </div>
        <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "guia") { echo " active"; } else { " "; } ?>" href="index.php?ruta=guia">Guia Rapida</a>

        <div class="right menu">
            <div class="header item">
                <i class="fas fa-graduation-cap fa-lg"></i> &nbsp; Contratos & Convenios
            </div>
            <a class="ui item supp"><i class="fas fa-th"></i></a>
            <a class="ui item supp"><i class="fas fa-paper-plane"></i></a>
            <a class="ui item supp"><i class="far fa-bell"></i></a>
            <a class="ui item supp"><i class="fas fa-certificate"></i></a>
            <a class="ui item supp" id="logout"><i class="fas fa-sign-out-alt"></i>Salir</a>
        </div>
    </div>
    <div class="ui bottom attached segment">
        <div class="ui inverted left vertical sidebar menu">
            <a class="item">
                <i class="digital ocean icon"></i>Apps
            </a>
            <a class="item">
                <i class="graduation cap icon"></i> Información Académica
            </a>
            <a class="item">
                <i class="share alternate icon"></i> Intranet
            </a>
            <a class="item">
                <i class="dochub icon"></i> Servicios Digitales
            </a>
        </div>
        <div class="pusher">
            <!-- BEGIN CONTENT -->
            <!-- <div class="pusher"> -->
            <div id="app" class="ui basic segment">
                <!-- El Contenido comienza aqui -->
                <div class="ui container">
                    <?php

                    if(isset($_GET["ruta"])){

                       if($_GET["ruta"] == "inicio" ||
                          $_GET["ruta"] == "convenios" ||
                          $_GET["ruta"] == "contratos" ||
                          $_GET["ruta"] == "catalogos" ||
                          $_GET["ruta"] == "instituciones" ||
                          $_GET["ruta"] == "usuarios" ||
                          $_GET["ruta"] == "guia"){

                              include $_GET["ruta"].".php";

                        }else{

                           include "error404.php";
                        }

                    }else{

                    include "inicio.php";

                    }

                    ?>

                </div>


                <!-- El Contenido termina aqui -->
            </div>
            <!-- </div> -->
            <!-- End pusher -->
            <!-- END CONTENT -->
        </div><!-- End pusher -->
    </div><!-- End main container -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
    <script src="https://kit.fontawesome.com/d27fce1847.js" crossorigin="anonymous"></script>
    <script src="./assets/js/g-master.js"></script>
    <script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/jquery.ui.widget.js"></script>
    <script src="assets/plugins/fileUpload/jquery.fileupload.js"></script>
    <?php echo "<script src='assets/js/p-".$_GET["ruta"].".js'></script>";?>
</body>

</html>