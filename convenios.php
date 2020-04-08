<?php 
    include 'include/header.html';
    include 'include/top-menu.php'; 
    include 'include/left-menu.php'; 
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<!-- BEGIN CONTENT -->
<!-- <div class="pusher"> -->
<div id="app" class="ui basic segment">
    <!-- El Contenido comienza aqui -->
    <div class="ui container">
        <h2 class="ui dividing header">Convenios</h2>
        <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevoConvenio" class="ui primary button" data-toggle="modal" data-target="#mdAltaEdicion"
                    data-command="ALTA"><i class="fa fa-plus"></i> Nuevo
                    convenio</button>
            </div>
        </div>
        <div class="example">
            <table id="tableConvenios" class="ui celled table responsive">
                <thead>
                    <tr>
                        <th class="">Nombre</th>
                        <th class="">Descripcion</th>
                        <th>Fecha firma</th>
                        <th>Fecha final</th>
                        <th class="">Editar</th>
                        <th class="">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="exmaple">
            <div class="ui modal" id="mdAltaEdicion">
                <i class="close icon"></i>
                <div class="header">
                    Nuevo Convenio
                </div>
                <div class="content">
                    <!-- <div class="ui piled segment"> -->
                        <form class="ui form" id="formConvenios">
                            <div class="field">
                                <div class="fields">
                                    <div class="six wide field">
                                        <label>Nombre</label>
                                        <input type="text" name="name" placeholder="Nombre / instrumento juridico">
                                    </div>
                                    <div class="ten wide field">
                                        <label>Objeto</label>
                                        <textarea rows="1" name="descripcion" placeholder="Descripcion"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Ambito</label>
                                        <select class="ui dropdown" name="dropdown">
                                            <option value="">Select</option>
                                            <option value="male">Choice 1</option>
                                            <option value="female">Choice 2</option>
                                        </select>
                                    </div>
                                    <div class="four wide field">
                                        <label>Programa</label>
                                        <select class="ui dropdown" name="dropdown">
                                            <option value="">Select</option>
                                            <option value="male">Choice 1</option>
                                            <option value="female">Choice 2</option>
                                        </select>
                                    </div>
                                    <div class="eight wide field">
                                        <label>Contraparte</label>
                                        <select class="ui dropdown" name="dropdown">
                                            <option value="">Select</option>
                                            <option value="male">Choice 1</option>
                                            <option value="female">Choice 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="fields">
                                    <div class="six wide field"><label>Fecha incio</label>
                                        <div class="ui calendar" id="date_calendar">
                                            <div class="ui input left icon">
                                                <i class="calendar icon"></i>
                                                <input type="text" placeholder="Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="four wide field"><label>Fecha indefinida</label>
                                        <div class="ui fitted checkbox">
                                            <label></label>
                                            <input type="checkbox" name="checkbox">
                                            <label></label>
                                        </div>
                                    </div>
                                    <div class="six wide field"><label>Fecha Vencimiento</label>
                                        <div class="ui calendar" id="date_calendar">
                                            <div class="ui input left icon">
                                                <i class="calendar icon"></i>
                                                <input type="text" placeholder="Date">
                                            </div>
                                        </div>
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
                    <div class="ui ok green right button">
                        Guardar
                    </div>
                    <!-- <div class="ui submit green inverted button">Guardar</div> -->
                </div>

            </div>
        </div>
        <input type='hidden' name='HFCommandName' id="HFCommandName" value="" />
        <input type='hidden' name='HFIdArea' id="HFIdArea" value="" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="assets/js/p-convenios.js"></script>