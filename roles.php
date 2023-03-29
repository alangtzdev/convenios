<!-- El Contenido comienza aqui -->
<div class="ui container" id="idDivBody">
    <h2 class="ui dividing header ui">Roles</h2>
    <div class="example">
        <div class="ui right floated main menu">
            <button id="btnNuevoRol" class="ui primary button" data-command="ALTA"><i class="fa fa-plus"></i>
                Nueva Rol
            </button>
        </div>
    </div>
    <div class="main ui  container">
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

        <table id="tableRoles" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Descripcion</th>
                    <th>Estatus</th>
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
                <form class="ui form" id="formRoles">
                    <div class="field">
                        <div class="fields">
                            <div class="four wide field">
                                <label>Rol</label>
                                <input type="text" id="txtRol" name="rol" placeholder="Nombre del rol">
                            </div>
                            <div class="eight wide field">
                                <label>Descripcion</label>
                                <input type="text" id="txtDescripcion" name="descripcion" placeholder="Descripcion">

                            </div>
                            <div class="for wide field">
                                <label>Estatus</label>
                                <div class="ui checkbox">
                                    <label></label>
                                    <input id="chkIsEstatus" type="checkbox" name="checkbox">
                                    <label>ACTIVO</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="ui dividing header blue">Modulos</h4>
                    <div class="field">
                        <div id="divModulosxRol" class="fields">

                        </div>
                        <div id="divModulosxRol1" class="fields">

                        </div>
                        <div id="divModulosxRol2" class="fields">

                        </div>
                        <div id="divModulosxRol3" class="fields">

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
    <input type='hidden' name='HFIdRol' id="HFIdRol" value="" />

</div>
<!-- El Contenido termina aqui -->