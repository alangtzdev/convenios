$(function () {

    getProfile();

    $('#formPerfil').form({
        on: 'blur',
        fields: {
            empty: {
                identifier: 'name',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter a value'
                    }
                ]
            }
        },
        onSuccess: function () {
            actualizarPerfil();
            return false;
        }
    });
});
function getProfile() {
    waitMeShow('#idDivBody');
    let params = {
        userEmail: Cookies.get('usuario')
    }
    fetch('./api/usuariosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getPerfil': params }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            $.each(response, function (i, value) {
                $('#HFIdUsuario').val(value.idUsuario);
                $('#txtNombre').val(value.nombre);
                // $('#spanNombre').text(value.nombre + ' ' + value.apaterno);
                $('#txtApellido').val(value.apellido);
                $('#txtUsuario').val(value.usuario);
                $('#txtCorreo').val(value.correo);
                $('#txtContrasenia').val(value.contrasenia);
            });
            waitMeHide('#idDivBody');

        }).catch(function (error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}
function actualizarPerfil() {
    let params = {
        idUsuario: $('#HFIdUsuario').val(),
        nombre: $('#txtNombre').val(),
        apellido: $('#txtApellido').val(),
        usuario: $('#txtUsuario').val(),
        correo: $('#txtCorreo').val(),
        contrasenia: $('#txtContrasenia').val()
    }
    waitMeShow('#idDivBody');
    fetch('./api/usuariosApi.php', {
        method: 'POST',
        body: JSON.stringify({ 'actualizarPerfil': params }),
        dataType: "JSON"
    })
    .then(response => {
        return response.json();
    })
    .then(response => {
            getProfile();
            waitMeHide('#idDivBody');
            $('body').toast({
                class: 'success',
                message: 'Perfil actualizado correctamente !'
            });


        }).catch(e => {

        });
}