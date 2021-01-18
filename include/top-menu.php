<div id="divMenuA" class="ui red-colsan inverted top attached tiny menu">
    <a class="item pizzabars"><i class="fas fa-bars"></i>&nbsp;Menu</a>
    <span class="item"><img src="/img/Logo.png"></span>
    <div id="perra" class="ui dropdown item">
        Administracion <i class="dropdown icon"></i>
        <div id="subMenuA" class="menu">
        </div>
    </div>
    <a class="item<?php if(isset($_GET["ruta"]) &&  $_GET["ruta"] == "guia") { echo " active"; } else { " "; } ?>"
        href="?ruta=guia">Guia Rapida</a>
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