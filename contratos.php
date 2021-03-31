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
        <h2 class="ui dividing header ui">Proyectos financiados</h2>
        <div class="example">
            <div class="ui right floated main menu">
                <button id="btnNuevo" class="ui primary button" data-command="ALTA" disabled><i class="fa fa-plus"></i>
                    Nuevo proyecto
                </button>
            </div>
        </div>
        <div class="main ui container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <table id="tableContratos" class="table display responsive dt-responsive celled" cellspacing="0">
                <thead>
                    <tr>
                        <th class="">Nombre</th>
                        <th>Contraparte</th>
                        <th>Fecha firma</th>
                        <th>Fecha vigencia</th>
                        <th>Tipo</th>
                        <th>Original</th>
                        <th>Finaciero Parcial/Final</th>
                        <th>Tecnico Parcial/Final</th>
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
                    <form class="ui form" id="formContratos">
                        <div class="field">
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Proyecto</label>
                                    <select id="idFinEspecificoMd" class="ui dropdown" name="dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                                <div class="eight wide field">
                                    <label>Estatus</label>
                                    <select id="idCondicionMd" class="ui dropdown" name="dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="six wide field">
                                    <label>Nombre del proyecto</label>
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
                                            <input id="fechaFirma" type="text" placeholder="Date">
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
                                <div class="six wide field"><label>Fecha vigencia</label>
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
                                    <select id="idContraparteMd" class="ui search dropdown" name="dropdown">
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
                                    <select name="" id="idResponsableMd" class="ui search dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Financiamiento</label>
                                    <input type="text" id="txtFinaciamiento" name="financiamiento" placeholder="">
                                </div>
                                <div class="eight wide field">
                                    <label for="">Pais</label>
                                    <select name="" id="idPaisMd" class="ui search dropdown">
                                        <option value="">Selecciona...</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h4 class="ui dividing header blue">Subir archivo</h4>
                        <div class="field">
                            <div class="fields">
                                <div class="eleven wide field divInputUpload" id="divArchivoNuevo">
                                    <label for="">Original</label>
                                    <div class="ui labeled input">
                                        <div class="ui olive label">Archivo</div>
                                        <button type="button" onclick="subir('idArchivo')">Escoger archivo</button>
                                        <input type="file" id="idArchivo" name="archivoNuevo" data-hfencryp="HFEncrypArchivo"
                                            data-hfruta="HFRutaArchivo" data-idprogress="#archivoResult"
                                            data-idlblresult="glosaArchivos" style="display: none">
                                        <span id="glosaArchivos">Ningun archivo seleccionado</span>
                                    </div>
                                    <div class="ui indicating progress divProgress" data-value="0" id="archivoResult">
                                        <div class="bar">
                                            <div id="progressArchivo" class="progress"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="eleven wide field divLabel" id="divArchivoConsul">
                                    <label for="">Original</label>
                                    <a target="_blank" id="aArchivoRef" href="" type="button"
                                        class="ui teal icon button"><i class="fa fa-file"></i></a>
                                    <p id="lblArchivoRef" for=""></p>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="eight wide field divInputUpload" id="divArchivoFinanParcial">
                                    <label for="">Informe financiero parcial</label>
                                    <div class="ui labeled input">
                                        <div class="ui olive label">Archivo</div>
                                        <button type="button" onclick="subir('idArchivoFinaParcial')">Escoger archivo</button>
                                        <input type="file" id="idArchivoFinaParcial" name="archivoNuevo" data-hfencryp="HFEncrypFinanParcial"
                                            data-hfruta="HFRutaFinanParcial" data-idprogress="#progressArchivoFinaParcial"
                                            data-idlblresult="lblFinParcial" style="display: none">
                                        <span id="lblFinParcial">Ningun archivo seleccionado</span>
                                    </div>
                                    <div class="ui indicating progress divProgress" data-value="0" id="progressArchivoFinaParcial">
                                        <div class="bar">
                                            <div id="" class="progress"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="eleven wide field divLabel" id="divArchiConsulFinanParcial">
                                    <label for="">Informe financiero parcial</label>
                                    <a target="_blank" id="aRefFinaParcial" href="" type="button"
                                        class="ui teal icon button"><i class="fa fa-file"></i></a>
                                    <p id="lblRefFinParcial" for=""></p>
                                </div>
                                <div class="eight wide field divInputUpload">
                                    <label for="">Informe financiero final</label>
                                    <div class="ui labeled input">
                                    <div class="ui olive label">Archivo</div>
                                        <button type="button" onclick="subir('idArchivoFinFinal')">Escoger archivo</button>
                                        <input type="file" id="idArchivoFinFinal" name="archivoNuevo" data-hfencryp="HFEcrypFinanFinal"
                                            data-hfruta="HFRutaFinanFinal" data-idprogress="#progreArchivoFinFinal"
                                            data-idlblresult="lblFinFinal" style="display: none">
                                        <span id="lblFinFinal">Ningun archivo seleccionado</span>
                                    </div>
                                    <div class="ui indicating progress divProgress" data-value="0" id="progreArchivoFinFinal">
                                        <div class="bar">
                                            <div id="" class="progress"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="eleven wide field divLabel" id="divArchiConsulFinanParcial">
                                    <label for="">Informe financiero final</label>
                                    <a target="_blank" id="aRefFinFinal" href="" type="button"
                                        class="ui teal icon button"><i class="fa fa-file"></i></a>
                                    <p id="lblRefFinFinal" for=""></p>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="eight wide field divInputUpload">
                                    <label for="">Informe tecnico parcial</label>
                                    <div class="ui labeled input">
                                        <div class="ui olive label">Archivo</div>
                                        <button type="button" onclick="subir('idArchivoTecParcial')">Escoger archivo</button>
                                        <input type="file" id="idArchivoTecParcial" name="archivoNuevo" data-hfencryp="HFEncrypTecnicoParcial"
                                            data-hfruta="HFRutaTecnicoParcial" data-idprogress="#progreArchivoTecParcial"
                                            data-idlblresult="lblTecParcial" style="display: none">
                                        <span id="lblTecParcial">Ningun archivo seleccionado</span>
                                    </div>
                                    <div class="ui indicating progress divProgress" data-value="0" id="progreArchivoTecParcial">
                                        <div class="bar">
                                            <div id="" class="progress"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="eleven wide field divLabel" id="divArchiConsulFinanParcial">
                                    <label for="">Informe tecnico parcial</label>
                                    <a target="_blank" id="aRefTecParcial" href="" type="button"
                                        class="ui teal icon button"><i class="fa fa-file"></i></a>
                                    <p id="lblRefTecParcial" for=""></p>
                                </div>
                                <div class="eight wide field divInputUpload">
                                    <label for="">Informe tecnico final</label>
                                    <div class="ui labeled input">
                                        <div class="ui olive label">Archivo</div>
                                        <button type="button" onclick="subir('idArchivoTecFinal')">Escoger archivo</button>
                                        <input type="file" id="idArchivoTecFinal" name="archivoNuevo" data-hfencryp="HFEncrypTecnicoFinal"
                                            data-hfruta="HFRutaTecnicoFinal" data-idprogress="#progreArchivoTecFinal"
                                            data-idlblresult="lblTecFinal" style="display: none">
                                        <span id="lblTecFinal">Ningun archivo seleccionado</span>
                                    </div>
                                    <div class="ui indicating progress divProgress" data-value="0" id="progreArchivoTecFinal">
                                        <div class="bar">
                                            <div id="" class="progress"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="eleven wide field divLabel" id="divArchiConsulFinanParcial">
                                    <label for="">Informe tecnico final</label>
                                    <a target="_blank" id="aRefTecFinal" href="" type="button"
                                        class="ui teal icon button"><i class="fa fa-file"></i></a>
                                    <p id="lblRefTecFinal" for=""></p>
                                </div>
                            </div>
                        </div>

                        <h4 class="ui dividing header blue">Compromisos</h4>
                        <div class="field">
                            <div class="fields">
                                <div class="four wide field"><label>Contratacion personal</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox" id=chkContraPersonal>
                                        <label>SI</label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Vinculacion de becarios</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox" id="chkVinculaBeca">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Productos entregables</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox" id="chkProductEntrega">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Informes financieros</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox" id="chkInfoFinan">
                                        <label></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="field">
                            <div class="fields">
                                <div class="four wide field"><label>informes tecnicos</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox" id="chkInfoTecnicos">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field"><label>Auditoria externa</label>
                                    <div class="ui fitted checkbox">
                                        <!-- <label></label> -->
                                        <input type="checkbox" name="checkbox" id="chkAudiExterna">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field"><label></label>
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
        <input type='hidden' name='HFIdContrato' id="HFIdContrato" value="" />
        <input type='hidden' name='HFEncrypArchivo' id="HFEncrypArchivo" value="" />
        <input type='hidden' name='HFRutaArchivo' id="HFRutaArchivo" value="" />
        <input type='hidden' name='HFEncrypFinanParcial' id="HFEncrypFinanParcial" value="" />
        <input type='hidden' name='HFRutaFinanParcial' id="HFRutaFinanParcial" value="" />
        <input type='hidden' name='HFEcrypFinanFinal' id="HFEcrypFinanFinal" value="" />
        <input type='hidden' name='HFRutaFinanFinal' id="HFRutaFinanFinal" value="" />
        <input type='hidden' name='HFEncrypTecnicoParcial' id="HREncrypTecnicoParcial" value="" />
        <input type='hidden' name='HFRutaTecnicoParcial' id="HFRutaTecnicoParcial" value="" />
        <input type='hidden' name='HFEncrypTecnicoFinal' id="HFEncrypTecnicoFinal" value="" />
        <input type='hidden' name='HFRutaTecnicoFinal' id="HFRutaTecnicoFinal" value="" />

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
<script src="assets/js/p-contratos.js"></script>