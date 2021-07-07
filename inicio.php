<?php 
    include 'include/header.php';
    include 'include/top-menu.php'; 
    include 'include/left-menu.php';
     
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">


<!-- BEGIN CONTENT -->
<!-- <div class="pusher"> -->
<div id="app" class="ui basic segment">
    <!-- El Contenido comienza aqui -->
    <div class="ui container" id="idDivBody">

        <h2 class="ui dividing header">Dashboard</h4>
            <div class="ui grid stackable padded">
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header red">
                            <i class="handshake icon"></i>
                            </div>
                            <div class="header">
                                <div class="ui red header" id="totalConvenios">
                                    <!-- <p ></p> -->
                                </div>
                            </div>
                            <div class="meta">
                                Total de convenios
                            </div>
                            <div class="description">
                                Convenios agregados hasta el dia de hoy!
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                               <a  class="ui red button"href="index.php?ruta=convenios">Ir a convenios</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header green">
                                <i class="icon clock"></i>
                            </div>
                            <div class="header">
                                <div class="ui header green" id="txtColaboracion"></div>
                            </div>
                            <div class="meta">
                                De colaboracion
                            </div>
                            <div class="description">
                                Agregar o actulizar el tipo de convenio que sea de <strong>Colaboracion</strong>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui green button">More Info</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header teal">
                                <i class="icon briefcase"></i>
                            </div>
                            <div class="header">
                                <div class="ui teal header" id="txtMarco"></div>
                            </div>
                            <div class="meta">
                                Marco
                            </div>
                            <div class="description">
                                Convenios de Marco 
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui teal button">More Info</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header purple">
                                <i class="icon trophy"></i>
                            </div>
                            <div class="header">
                                <div class="ui purple header" id="txtEspecifico"></div>
                            </div>
                            <div class="meta">
                                Especificos
                            </div>
                            <div class="description">
                              Convenios especificos
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui purple button">More Info</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui grid stackable padded">
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header red">
                            <i class="handshake icon"></i>
                            </div>
                            <div class="header">
                                <div class="ui red header" id="totalContratos">
                                </div>
                            </div>
                            <div class="meta">
                                Total de Proy. financiados 
                            </div>
                            <div class="description">
                                Proyectos financiados agregados hasta hoy!
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                               <a  class="ui yellow button"href="index.php?ruta=convenios">Ir a Proyectos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header green">
                                <i class="icon clock"></i>
                            </div>
                            <div class="header">
                                <div class="ui header green" id="txtPrivado"></div>
                            </div>
                            <div class="meta">
                               Privado
                            </div>
                            <div class="description">
                            Proyectos financiados Privados
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui green button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header teal">
                                <i class="icon briefcase"></i>
                            </div>
                            <div class="header">
                                <div class="ui teal header" id="txtPublico"></div>
                            </div>
                            <div class="meta">
                                Publico
                            </div>
                            <div class="description">
                            Proyectos financiados Publicos
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui teal button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui right floated header purple">
                                <i class="icon trophy"></i>
                            </div>
                            <div class="header">
                                <div class="ui purple header" id="txtSocial"></div>
                            </div>
                            <div class="meta">
                                Social
                            </div>
                            <div class="description">
                            Proyectos financiados Sociales
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="ui two buttons">
                                <div class="ui purple button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>


    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script src="assets/js/p-dashboard.js"></script>