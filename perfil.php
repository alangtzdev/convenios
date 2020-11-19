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
    <div class="ui container center aligned" id="idDivBody">
        <h2 class="ui dividing header">Perfil de Usuario</h2>
        <div class="main ui  container">
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <div class="ui hidden divider"></div>
            <form class="ui form" id="formPerfil">

                <div class="field">
                    <div class="fields">
                    <div class="seven wide field">
                    <!-- <img class="ui small circular image" src="assets/img/wireframe/square-image.png"> -->
                    </div>
                    <div class="five wide field">
                    <img class="ui small circular image" src="assets/img/wireframe/square-image.png">
                    </div>
                    <div class="four wide field">
                    <!-- <img class="ui small circular image" src="assets/img/wireframe/square-image.png"> -->
                    </div>
                    </div>
                    <div class="fields">
                        <div class="six wide field">
                            <label>Nombres</label>
                            <input type="text" id="txtNombre" name="name" placeholder="Nombre(s)">
                        </div>
                        <div class="ten wide field">
                            <label>Apellidos</label>
                            <input type="text" id="txtApellido" name="apellido" placeholder="Apellidos">

                        </div>
                    </div>
                    <div class="fields">
                    <div class="six wide field">
                            <label for="">Correo</label>
                            <input type="text" name="" id="txtCorreo">
                        </div>
                        <div class="five wide field">
                            <label for="">Usuario</label>
                            <input type="text" name="" id="txtUsuario">
                        </div>
                        <div class="five wide field">
                            <label for="">Contraseña</label>
                            <input type="text" name="" id="txtContrasenia">
                        </div>
                    </div>
                    <div class="fields">
                    <button id="btnGuardar" type="submit" class="ui ok orange right button">
                        Actualizar
                    </button>
                    </div>
                </div>
                <div class="ui error message"></div>
            </form>

        </div>

        <input type='hidden' name='HFCommandName' id="HFCommandName" value="" />
        <input type='hidden' name='HFIdUsuario' id="HFIdUsuario" value="" />
         <input type="hidden" name="HFUserEmail" id="HFUserEmail" value="<?php echo $_COOKIE['username'] ?>" />

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="assets/plugins/jquery.ui.widget.js"></script>
<script src="assets/js/p-perfil.js"></script>