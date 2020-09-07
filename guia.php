<?php 
    include 'include/header.php';
    include 'include/top-menu.php'; 
    include 'include/left-menu.php'; 
?>
<link rel="stylesheet" href="assets/plugins/datatable/jquery.dataTables.min.css">

<!-- BEGIN CONTENT -->
<!-- <div class="pusher"> -->
<div id="app" class="ui basic segment">
    <!-- El Contenido comienza aqui -->
    <div class="ui container" id="idDivBody">
        <h2 class="ui dividing header ui">Guia Rapida</h2>
        <div class="main ui  container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>


        </div>
        <div class="exmaple">
            <!-- <h5 class="ui header"><i class="fa fa-user"> </i> Crear nuevo responsable</h5> -->
            <h2 class="ui teal header">
                <div class="content">
                    <i class="fa fa-user"></i> Crear nuevo responsable
                </div>
            </h2>
            <div class="ui tiny breadcrumb">
                <a class="section">Indices</a>
                <i class="right chevron icon divider"></i>
                <a class="section">Usuarios</a>
                <i class="right chevron icon divider"></i>
                <div class="active section"><i class="fa fa-plus"> </i><a class="section" href="usuarios.php"> Nuevo usuario</a></div>
            </div>
            <!-- <h5 class="ui header"><i class="fa fa-school"> </i> Crear nueva contraparte</h5> -->
            <h2 class="ui blue header">
                <div class="content">
                    <i class="fa fa-school"></i> Crear nueva contraparte
                </div>
            </h2>
            <div class="ui tiny breadcrumb">
                <a class="section">Indices</a>
                <i class="right chevron icon divider"></i>
                <a class="section">Instituciones</a>
                <i class="right chevron icon divider"></i>
                <div class="active section"><i class="fa fa-plus"> </i><a class="section" href="instituciones.php"> Nueva Institucion</a></div>
            </div>
            <!-- <h5 class="ui header"><i class="fa fa-book"> </i> Crear Nuevo: Programa, Origen, Ambito, etc.</h5> -->
            <h2 class="ui violet header">
                <div class="content">
                    <i class="fa fa-book"></i> Crear Nuevo: Programa, Origen, Ambito, etc.
                </div>
            </h2>
            <div class="ui tiny breadcrumb">
                <a class="section">Indices</a>
                <i class="right chevron icon divider"></i>
                <a class="section">Catalogos</a>
                <i class="right chevron icon divider"></i>
                <div class="active section"><i class="fa fa-plus"> </i><a class="section" href="catalogos.php"> Nuevo Catalogo</a></div>
            </div>
            <!-- <h5 class="ui header"><i class="fa fa-bookmark"> </i> Crear Nueva Categoria</h5> -->
            <h2 class="ui purple header">
                <div class="content">
                    <i class="fa fa-bookmark"></i> Crear Nueva Categoria
                </div>
            </h2>
            <p class="ui orange"><i class="fa fa-wrench"></i> Proximamente !</p>

            <h3 class="ui orange header">Nota: Los nombre o etiquetas de los modulos se pueden modificar (especificar) <i class="fa fa-exclamation"></i></h3>


        </div>

        <input type='hidden' name='HFCommandName' id="HFCommandName" value="" />
        <input type='hidden' name='HFIdInstitucion' id="HFIdInstitucion" value="" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jquery.ui.widget.js"></script>
<script src="assets/js/p-instituciones.js"></script>