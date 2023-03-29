<!-- El Contenido comienza aqui -->
<div class="ui container" id="idDivBody">
    <h2 class="ui dividing header ui">Coediciónes</h2>
    <h4 class="text-right">Modulo en desarollo de prueba</h4>
    <div class="example">
        <div class="ui right floated main menu">
            <button id="btnNuevo" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i>
                Nueva coedición
            </button>
        </div>
    </div>
    <div class="main ui container">
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <table id="tableCoediciones" class="ui celled table" style="width:100%">
            <!-- class="table table-striped table-hover dt-responsive table-condensed display compact" cellspacing="0"> -->
            <thead class="table-title">
                <tr>
                    <th>Coedición</th>
                    <th>Contraparte</th>
                    <th>Fecha firma</th>
                    <th>Fecha vigencia</th>
                    <th>Autor</th>
                    <th>Archivo</th>
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
                <form class="ui form" id="formCoediciones">
                    <div class="field">
                        <div class="fields">
                            <div class="ten wide field ">
                                <label>Coedicion</label>
                                <input type="text" id="txtNombre" name="name" placeholder="Libro / Obra">
                            </div>
                            <div class="six wide field">
                                <label>Estatus</label>
                                <select id="idCondicionMd" class="ui dropdown" name="dropdown">
                                    <option value="">Selecciona...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Autor</label>
                                <input type="text" id="txtAutor" name="" placeholder="Autor">
                            </div>
                            <div class="eight wide field">
                                <label>Coautor</label>
                                <input type="text" id="txtCoautor" name="" placeholder="Coautor">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="fields">
                        <div class="sixteen wide field">
                                <label>Objeto</label>
                                <textarea rows="1" id="txtDescripcion" name="descripcion" placeholder="Descripcion"></textarea>
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
                            <div class="eight wide field">
                                <label for="">Origen</label>
                                <select name="" id="idOrigenMd" class="ui dropdown">
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
                                <!-- <label for="">Pais</label>
                                    <div class="ui fluid search selection dropdown">
                                        <input type="hidden" name="country">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Select Country</div>
                                        <div class="menu">
                                        </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                    <h4 class="ui dividing header blue">Subir archivo</h4>
                    <div class="field">
                        <div class="fields">
                            <div class="eleven wide field" id="divArchivoNuevo">
                                <div class="ui labeled input">
                                    <div class="ui olive label">
                                        Archivo
                                        <!-- <span class="fileinput-exists"> Cambiar </span> -->
                                    </div>
                                    <!-- <input id="idArchivo" type="file" name="archivoNuevo" data-file="archivoNew" data-idprogress="#archivoResult" data-divresult="#lblResult"> -->

                                    <button type="button" data-archivone="idArchivo" id="subirArchivo" onclick="subir('idArchivo')">Escoger archivo</button>
                                    <input type="file" id="idArchivo" name="archivoNuevo" data-file="archivoNew" data-idprogress="#archivoResult" data-idlblresult="#glosaArchivos" style="display: none">
                                    <span id="glosaArchivos">Ningun archivo seleccionado</span>
                                </div>
                                <div class="ui indicating progress" data-value="0" id="archivoResult">
                                    <div class="bar">
                                        <div id="progressArchivo" class="progress"></div>
                                    </div>
                                    <!-- <div class="label" id="lblResult" ></div> -->
                                </div>
                            </div>
                            <div class="eleven wide field" id="divArchivoConsul">
                                <a target="_blank" id="aArchivoRef" href="" type="button" class="ui teal icon button" /><i class="fa fa-file"></i></a>
                                <label for="" id="lblArchivoRef"></label>
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
    <input type='hidden' name='HFIdCoedicion' id="HFIdCoedicion" value="" />
    <input type='hidden' name='HFEncrypArchivo' id="HFEncrypArchivo" value="" />
    <input type='hidden' name='HFRutaArchivo' id="HFRutaArchivo" value="" />

</div>
<!-- El Contenido termina aqui -->