<?php 
    include 'include/header.html';
    include 'include/top-menu.php'; 
    include 'include/left-menu.php'; 
?>
<link rel="stylesheet" href="assets/plugins/datatable/jquery.dataTables.min.css">

<!-- BEGIN CONTENT -->
<!-- <div class="pusher"> -->
<div id="app" class="ui basic segment">
    <!-- El Contenido comienza aqui -->
    <div class="ui container">
        <h2 class="ui dividing header ui">Instituciones</h2>
        <!-- <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevoContrato" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i>
                    Nuevo catalogo
                </button>
            </div>
        </div> -->
        <div class="main ui  container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui icon orange message">
                <i class="notched circle loading icon"></i>
                <div class="content">
                    <div class="header">
                        PROXIMAMENTE !
                    </div>
                    <p>Actualmente estamos trabajando en este modulo.</p>
                </div>
            </div>


            <!-- <table id="tableCatalogos" class="table display responsive dt-responsive celled" cellspacing="0">
                <thead>
                    <tr>
                        <th class="">Categoria</th>
                        <th>Catalogo</th>
                        <th>Descripcion</th>
                        <th class="no-sort">Editar</th>
                        <th class="no-sort">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table> -->
        </div>

        <input type='hidden' name='HFCommandName' id="HFCommandName" value="" />
        <input type='hidden' name='HFIdContrato' id="HFIdContrato" value="" />
        <input type='hidden' name='HFEncrypArchivo' id="HFEncrypArchivo" value="" />
        <input type='hidden' name='HFRutaArchivo' id="HFRutaArchivo" value="" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jquery.ui.widget.js"></script>
<script src="assets/plugins/fileUpload/jquery.fileupload.js"></script>
<!-- <script src="assets/js/p-catalogos.js"></script> -->