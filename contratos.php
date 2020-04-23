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
        <h2 class="ui dividing header ui">Contratos</h2>
        <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevoContrato" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i> 
                    Nuevo contrato
                </button>
            </div>
        </div>
        <div class="main ui container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <table id="tableContratos" class="ui green celled table responsive">
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
                <div class="ui red header">
                    Nuevo contrato
                </div>
                <div class="content">
                    <!-- <div class="ui piled segment"> -->
                    <form class="ui form" id="formContratos">
                        <div class="field">
                            <div class="fields">
                                <div class="six wide field">
                                    <label>Nombre</label>
                                    <input type="text" id="txtNombre" name="name"
                                        placeholder="Nombre / instrumento juridico">
                                </div>
                                <div class="ten wide field">
                                    <label>Objeto</label>
                                    <textarea rows="1" id="txtDescripcion" name="descripcion"
                                        placeholder="Descripcion"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="six wide field"><label>Fecha firma</label>
                                    <div class="ui calendar" id="divFechaFirma">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input  id="fechaFirma" type="text" placeholder="Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Vigencia indefinida</label>
                                    <div class="ui checkbox">
                                        <label></label>
                                        <input id="chkIndefinida" type="checkbox" name="checkbox">
                                        <label>SI</label>
                                    </div>
                                </div>
                                <div class="six wide field"><label>Fecha Vencimiento</label>
                                    <div class="ui calendar" id="divFechaFin">
                                        <div class="ui input left icon">
                                            <i class="calendar icon"></i>
                                            <input id="fechaFin" type="text" placeholder="Date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="four wide field">
                                    <label>Programa</label>
                                    <select id="idProgramaMd" class="ui dropdown" name="dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                                <div class="eight wide field">
                                    <label>Contraparte</label>
                                    <select id="idContraParteMd" class="ui dropdown" name="dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                                <div class="four wide field">
                                    <label>Ambito</label>
                                    <select id="idAmbitoMd" class="ui dropdown" name="dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="four wide field">
                                    <label for="">Origen</label>
                                    <select name="" id="idOrigenMd" class="ui dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                                <div class="four wide field">
                                    <label for="">Tipo de contrato</label>
                                    <select name="" id="idTipoConvenioMd" class="ui dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                                <div class="eight wide field">
                                    <label for="">Responsable</label>
                                    <select name="" id="idResponsableMd" class="ui dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="eight wide field">
                                <label>Financiamiento</label>
                                <input type="number" id="txtFinaciamiento" name="financiamiento"
                                        placeholder="">
                                </div>
                                <div class="eight wide field">
                                <label for="">Pais</label>
                                <select name="" id="" class="ui dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h4 class="ui dividing header">Compromisos</h4>
                        <div class="field">
                            <div class="fields">
                            <div class="four wide field"><label>Intercambio estudiante</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox">
                                        <label>SI</label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Intercambio profesores</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Acceso biblioteca</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Servicio social estudiantes</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox">
                                        <label></label>
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
                    <button type="submit" class="ui ok green right button">
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
        <input type='hidden' name='HFIdContrato' id="HFIdContrato" value="" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="assets/js/p-contratos.js"></script>