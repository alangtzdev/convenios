function crearAcciones(id) {
    let idModulo_Rol = id;
    // let idModulo_Rol = parseInt(Cookies.get('idModulo_Rol'));
    fetch('./api/accesosApi.php', {
            method: 'POST',
            body: JSON.stringify({ 'getAccesosModuloRol': { idModulo_Rol: idModulo_Rol } }),
            dataType: 'JSON'
        })
        .then(response => {
            return response.json();
        })
        .then(response => {

            $(response).each(function(index, element) {
                switch (element.accion) {
                    case 'ALTA':
                        if (element.estatus === 1) {
                            $('#btnNuevo').attr('disabled', false);
                            console.log('ok');
                        }
                        break;
                    case 'EDITAR':
                        if (element.estatus === 1) {
                            $('.btnEditar').attr('disabled', false);
                            console.log('editar, ok');
                        }
                        break;
                    case 'ELIMINAR':
                        if (element.estatus === 1) {
                            $('.btnEliminar').attr('disabled', false);
                            console.log('eli,ok');
                        }
                        break;
                    default:
                        break;
                }
            });
        }).catch(e => {
            console.error('no funciona');
        });

}