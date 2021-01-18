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
        <h2 class="ui dividing header ui">Permisos por acceso</h2>
        <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevoAcceso" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i>
                    Asignar permisos
                </button>
            </div>
        </div>
        <div class="main ui  container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>

            <table id="tableAccesos" class="table display responsive dt-responsive celled" cellspacing="0">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Modulo</th>
                        <th>Permisos</th>
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
                    <form class="ui form" id="formAccesos">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Role</label>
                                <select id="idRolMd" class="ui dropdown ddRolMd" name="dropdown">
                                    <option value="">Selecciona...</option>
                                </select>
                            </div>
                            <div class="eight wide field">
                                <label>Modulos del Rol</label>
                                <select id="idModuloMd" class="ui dropdown ddModuloMd" name="dropdown">
                                    <option class="textModulo" value="">Selecciona...</option>
                                </select>
                            </div>
                        </div>
                        <h4 class="ui dividing header blue">Permisos/Acciones por Modulo</h4>
                        <div class="field">
                        <div id="divPermisos" class="fields">
                                
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
        <input type='hidden' name='HFIdAcceso' id="HFIdAcceso" value="" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jquery.ui.widget.js"></script>
<script src="assets/js/p-accesos.js"></script>