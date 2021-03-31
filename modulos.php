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
        <h2 class="ui dividing header ui">Modulos</h2>
        <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevoModulo" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i>
                   Nuevo Modulo
                </button>
            </div>
        </div>
        <div class="main ui  container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>

            <table id="tableModulos" class="table display responsive dt-responsive celled" cellspacing="0">
                <thead>
                    <tr>
                        <th>Modulo</th>
                        <th>Indice</th>
                        <th>Ruta</th>
                        <th>Icon</th>
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
                    <form class="ui form" id="formModulos">
                        <div class="field">
                            <div class="fields">
                                <div class="four wide field">
                                    <label>Nombre del Modulo</label>
                                    <input type="text" id="txtNombre" name="name"
                                        placeholder="Nombre modulo">
                                </div>
                                <div class="four wide field">
                                    <label>Indice</label>
                                    <input type="text" id="txtApellido" name="apellido"
                                        placeholder="Apellidos">
                                </div>
                                <div class="four wide field">
                                    <label>Ruta</label>
                                    <input type="text" id="txtApellido" name="apellido"
                                        placeholder="Apellidos">
                                </div>
                                <div class="four wide field">
                                    <label>Icono</label>
                                    <input type="text" id="txtApellido" name="apellido"
                                        placeholder="Apellidos">
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
                <button class="ui positive button">Si</button>
                <button class="ui negative button cancel">No</button>
            </div>
        </div>

        <input type='hidden' name='HFCommandName' id="HFCommandName" value="" />
        <input type='hidden' name='HFIdModulo' id="HFIdModulo" value="" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jquery.ui.widget.js"></script>
<script src="assets/js/p-modulos.js"></script>