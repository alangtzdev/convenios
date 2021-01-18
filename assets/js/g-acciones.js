function crearAcciones() {
    let idModulo_Rol = parseInt(Cookies.get('idModulo_Rol'));
    fetch('./api/accesosApi.php', {
        method: 'POST',
        body: JSON.stringify({ 'getAccesosModuloRol': { idModulo_Rol: idModulo_Rol } }),
        dataType: 'JSON'
    })
        .then(response => {
            return response.json();
        })
        .then(response => {

            $(response).each(function (index, element) {
                switch (element.accion) {
                    case 'ALTA':
                        if (element.estatus === 1) {
                            $('#btnNuevoConvenio').attr('disabled', false);
                        }
                        break;
                    case 'ELIMINAR':
                        if (element.estatus === 0) {
                            $('#btnEditar').attr('disabled', true);
                        }
                        break;
                    case 'EDITAR':
                        if (element.estatus === 0) {
                            $('#btnEliminar').attr('disabled', true);
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
