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
                    <div class="ui fluid red card">
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
                                Total
                            </div>
                            <div class="description">
                                Convenios hasta el dia de hoy
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid green card">
                        <div class="content">
                            <div class="ui right floated header green">
                                <i class="icon clock"></i>
                            </div>
                            <div class="header">
                                <div class="ui header green" id="txtColaboracion"></div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Convenio que sea de colaboracion
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid teal card">
                        <div class="content">
                            <div class="ui right floated header teal">
                                <i class="icon briefcase"></i>
                            </div>
                            <div class="header">
                                <div class="ui teal header" id="txtMarco"></div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Convenios de Marco
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid purple card">
                        <div class="content">
                            <div class="ui right floated header purple">
                                <i class="icon trophy"></i>
                            </div>
                            <div class="header">
                                <div class="ui purple header" id="txtEspecifico"></div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Convenios especificos
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui grid stackable padded">
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid yellow card">
                        <div class="content">
                            <div class="ui right floated header yellow">
                                <i class="handshake icon"></i>
                            </div>
                            <div class="header">
                                <div class="ui yellow header" id="totalContratos">
                                </div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Proyectos financiados agregados hasta el dia de hoy
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid green card">
                        <div class="content">
                            <div class="ui right floated header green">
                                <i class="icon clock"></i>
                            </div>
                            <div class="header">
                                <div class="ui header green" id="txtPrivado"></div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Proyectos financiados Privados
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid teal card">
                        <div class="content">
                            <div class="ui right floated header teal">
                                <i class="icon briefcase"></i>
                            </div>
                            <div class="header">
                                <div class="ui teal header" id="txtPublico"></div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Proyectos financiados Publicos
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid purple card">
                        <div class="content">
                            <div class="ui right floated header purple">
                                <i class="icon trophy"></i>
                            </div>
                            <div class="header">
                                <div class="ui purple header" id="txtSocial"></div>
                            </div>
                            <div class="meta">
                                Total
                            </div>
                            <div class="description">
                                Proyectos financiados Sociales
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <div class="ui modal inicioMd">
        <i class="close icon"></i>
        <div class="ui center aligned header">
        </div>
        <div class="content" style="background: #235b4e;">
            <div class="ui justified description" style="color: #fff;">
                <p>El módulo tiene como propósito poner al alcance de los usuarios la información actualizada sobre los convenios de colaboración
                    académica e interinstitucional, así como la información de contratos y los proyectos con financiamiento externo
                    que se desarrollan en El Colegio de San Luis.
                </p>
                <p>Contiene información básica sobre instituciones participantes, tipo de convenio, fecha de firma, vigencia, versión PDF y en el caso de proyectos o contratos, se agrega el nombre del proyecto, información financiera, informes de avance y en su caso los informes técnicos que se presentan a lo largo del desarrollo del proyecto.</p>
                <p>Por la naturaleza de la información que aquí se presenta, los usuarios tienen acceso al módulo para hacer las consultas correspondientes y en los casos que sea necesario el acceso para descargas e impresión de documentos, se requiere autorización expresa de la Secretaría General a través del administrador del módulo.
                    La actualización, mantenimiento y operación de este módulo esta a cargo de los titulares de la Unidad Jurídica, del Responsable de Proyectos de la Dirección de Contabilidad y de la Unidad de Tecnologías de la Información y Comunicaciones.</p>
                <p></p>
            </div>
            <div class="ui center aligned header" style="background: #235b4e; color:#fff">
                Secretaria General
            </div>
        </div>

        <div class="actions">
            <!-- <div class="ui black deny button">
                Nope
            </div> -->
            <div class="ui positive right labeled icon button">
                Enterado
                <i class="checkmark icon"></i>
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