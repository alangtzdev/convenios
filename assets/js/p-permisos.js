$(() => {
    getPermisos();
    getRoles();

    $('#btnNuevoPermiso').click(function () {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formPermisos').form({
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
        savePermiso();
        return false;
      }
    });

    $('#tablePermisos tbody').on('click', '#linkPermiso', function () {
      var table = $('#tablePermisos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tablePermisos tbody').on('click', '#editar', function () {
      var table = $('#tablePermisos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });
});
function mdAltaEdicion(command) {
    $('#mdAltaEdicion')
    .modal({
      closable: false,
      onShow: function () {
        $('#btnGuardar').show();
        $('#HFCommandName').val(command);
        $('#txtTitle').text('ALTA');
        if (command == 'CONSULTA') {
          $('#txtTitle').text('CONSULTA');
          $('#btnGuardar').hide();
          $('.ui.dropdown.selection').addClass('disabled');
          $("#mdAltaEdicion :input").each(function (index) {
            $(this).attr('readonly', true);
          });
        } else if (command == 'EDITAR'){

          $('#txtTitle').text('EDITAR');

        }
      },
      onHide: function () {
        $('#HFIdPermiso').val('');
        $('.ui.form').form('reset');
        $('.ui.form .field.error').removeClass("error");
        $('.ui.form.error').removeClass("error");
        $('.ui.form :input').attr('readonly', false);
        $('.ui.dropdown.selection').removeClass('disabled');
      },
      onApprove: function () {
        $('.ui.form').form('submit');
        return false;
      }
    }).modal('show');
}
function getPermisos() {
  waitMeShow('#idDivBody');
    fetch('./api/permisosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getPermisos': {} }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            var table = $('#tablePermisos').DataTable();
            table.destroy();
            let arrColor = ['orange','yellow','olive','green','teal','blue','violet','purple','pink','brown','grey','black'];
            let color = "";
            
            $('#tablePermisos').DataTable({
                language: { "url": "./assets/plugins/datatable/Spanish.json" },
                data: response,
                buttons: ['pdf'],
                columnDefs: [
                    { "bSortable": false, "aTargets": [2, 3] },
                    {
                        className: "dt-center",
                        "targets": "_all"
                    }],
                columns: [
                    {
                        data: "nombre",
                        mRender: function (data, type, full) {
                            return '<a type="button" id="linkPermiso"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
                        }
                    },
                    // {
                    //     mRender: function (data, type, full) {
                    //         // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                    //         return (full.apellido != "" ? full.apellido : 'No hay apellidos');
                    //       }
                    // },
                    {
                        data: "accion"
                    },
                    {
                      data: "icon"
                    },
                    {
                      data: "class"
                    },
                    {
                        mRender: function (data, type, full) {
                            return "<button id='editar' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil'></i></button>";
                        },
                        width: "8%",
                    },
                    {
                        mRender: function (data, type, full) {
                            return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deletePermiso(' + full.idPermiso + ')"/><i class="fa fa-trash"></i></button>';
                        },
                        width: "8%",
                    }]
            });
            waitMeHide('#idDivBody');
        }).catch(function (error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
    
}
function getRoles() {
  fetch('./api/rolesApi.php', {
    method: "POST",
    body: JSON.stringify({ 'getRoles': {} }),
    dataType: "JSON"
  })
    .then(function (response) {
      return response.json();
    })
    .then(response => {
      // let datos =  JSON.parse(response);

      $(response).each(function (index, element) {
          // $('#idPaisMD').addClass('fluid search');
          $('#idRolMd').append($('<option>').text(element.rol).attr('value', element.idRol));
        
      });


    }).catch(function (error) {
      console.log('Hubo un problema con la petición Fetch:' + error.message);
    });
}
function loadData(data) {

    $('#HFCommandName').val('EDITAR');
    $('#HFIdPermiso').val(data.idPermiso);
    $('#txtNombre').val(data.nombre);
    $('#txtApellido').val(data.apellido);
    $('#idRolMd').dropdown('set selected',data.idRol);
    $('#txtCorreo').val(data.correo);
    $('#txtPermiso').val(data.usuario);
    if(data.isResponsable) { $('#chkIsResp').prop('checked', true); }

}

function savePermiso() {

  let idPermiso = $('#HFIdPermiso').val() != '' ? $('#HFIdPermiso').val() : '',
  params = {
    HFCommandName: $('#HFCommandName').val(),
    idPermiso: idPermiso,
    nombre: $('#txtNombre').val(),
    apellido: $('#txtApellido').val(),
    idRol: $('#idRolMd').val(),
    correo: $('#txtCorreo').val(),
    usuario: $('#txtPermiso').val(),
    isResponsable: $('#chkIsResp').is(':checked') == true ? 1 : 0 , 
  };
fetch('./api/permisosApi.php', {
  method: "POST",
  body: JSON.stringify({ 'savePermiso': params }),
  dataType: "JSON"
})
  .then(response => {
    return response.json();
  })
  .then(response => {
    getPermisos();
    $('#mdAltaEdicion').modal('hide');
    $('body').toast({
      class: 'success',
      message: `Permiso guardado correctamente !`
    });
  }).catch(error => {
    $('body').toast({ class: 'error', message: `An error occured !` + error.message });
  });

}

function deletePermiso(idPermiso) {
    $('#domtoastactions')
      .toast({
        displayTime: 0,
        onDeny: function () {
          // $('body').toast({message:'Wait not yet!'});
          // return false;
        },
        onApprove: function () {
          fetch('./api/permisosApi.php', {
            method: "POST",
            body: JSON.stringify({ 'deletePermiso': { idPermiso: idPermiso } }),
            dataType: "JSON"
          })
            .then(response => {
              return response.json();
            })
            .then(response => {
              getPermisos();
              $('#mdAltaEdicion').modal('hide');
              $('body').toast({
                class: 'success',
                message: 'Permiso eliminado correctamente !'
              });
            }).catch(error => {
              $('body').toast({ class: 'error', message: `An error occured !` + error.message });
            });
  
        }
      });
}
