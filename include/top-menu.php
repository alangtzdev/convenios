<div class="ui red-colsan inverted top attached tiny menu">
    <a class="item pizzabars"><i class="fas fa-bars"></i>&nbsp;Menu</a>
    <span class="item"><img src="/img/Logo.png"></span>

    <a class="item<?php if(empty($_GET) || $_GET["ruta"] == "inicio") { echo " active"; } else { ""; } ?>"
        href="index.php?ruta=inicio">Inicio</a>
    <a class="item<?php if(isset($_GET["ruta"]) && $_GET["ruta"] == "convenios") { echo " active"; } else { " inactive"; } ?>"
        href="index.php?ruta=convenios">Convenios</a>
    <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "contratos") { echo " active"; } else { " inactive"; } ?>"
        href="index.php?ruta=contratos">Proyectos financiados</a>

    <div class="ui dropdown item">
        Indices <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "catalogos") { echo " active"; } else { ""; } ?>"
                href="index.php?ruta=catalogos">Catalogos</a>
            <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "instituciones") { echo " active"; } else { " "; } ?>"
                href="index.php?ruta=instituciones">Instituciones / Contraparte</a>
            <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "usuarios") { echo " active"; } else { " "; } ?>"
                href="index.php?ruta=usuarios">Usuarios / Responsables</a>
        </div>
    </div>
    <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "guia") { echo " active"; } else { " "; } ?>"
        href="index.php?ruta=guia">Guia Rapida</a>
    <div class="right menu">
        <div class="header item">
            <i class="fas fa-graduation-cap fa-lg"></i> &nbsp; Contratos & Convenios
        </div>
        <a class="ui item supp"><i class="fas fa-th"></i></a>
        <a class="ui item supp"><i class="fas fa-paper-plane"></i></a>
        <a class="ui item supp"><i class="far fa-bell"></i></a>
        <a class="ui item supp"><i class="fas fa-certificate"></i></a>
        <a class="ui item supp" id="logout" href="salir.php"><i class="fas fa-sign-out-alt"></i>Salir</a>
    </div>
</div>
<div class="ui bottom attached segment">