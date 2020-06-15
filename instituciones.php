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
        <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevoInstitucion" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i>
                    Nueva institución
                </button>
            </div>
        </div>
        <div class="main ui  container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>

            <table id="tableInstituciones" class="table display responsive dt-responsive celled" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Abreviacion</th>
                        <th class="no-sort">Editar</th>
                        <th class="no-sort">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="exmaple">
            <div class="ui modal" id="mdAltaEdicion">
                <i class="close icon"></i>
                <div class="ui red header" id="txtTitle">
                </div>
                <div class="content">
                    <!-- <div class="ui piled segment"> -->
                    <form class="ui form" id="formInstituciones">
                        <div class="field">
                            <div class="fields">
                                <div class="six wide field">
                                    <label>Nombre</label>
                                    <input type="text" id="txtNombre" name="name"
                                        placeholder="Nombre de la institucion">
                                </div>
                                <div class="ten wide field">
                                    <label>Abreviacion</label>
                                    <input type="text" id="txtAbreviacion" name="abreviacion"
                                        placeholder="Ejemplo: UASLP">

                                </div>
                            </div>
                        </div>
                        <div class="ui error message"></div>
                    </form>
                    <!-- </div> -->
                </div>
                <div class="actions">
                    <div class="ui cancel red button">
                        cancelar
                    </div>
                    <button id="btnGuardar" type="submit" class="ui ok green right button">
                        Guardar
                    </button>
                    <!-- <div class="ui submit green inverted button">Guardar</div> -->
                </div>

            </div>
        </div>
        <div class="ui orange toast" id="domtoastactions">
            <div class="content">
                <div class="ui header">ELIMINAR</div>
                Seguro que deseas eliminar este registro?
            </div>
            <div class="left basic actions">
                <button class="ui positive button">Yes</button>
                <button class="ui negative button cancel">No</button>
            </div>
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