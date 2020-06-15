$(() => {
    getUsuarios();

    $('#btnNuevoUsuario').click(function () {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formUsuarios').form({
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
        saveUsuario();
        return false;
      }
    });

    $('#tableUsuarios tbody').on('click', '#linkUsuario', function () {
      var table = $('#tableUsuarios').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tableUsuarios tbody').on('click', '#editar', function () {
      var table = $('#tableUsuarios').DataTable();
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
        $('#HFIdUsuario').val('');
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
function getUsuarios() {
    fetch('./api/usuariosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getUsuarios': {} }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            var table = $('#tableUsuarios').DataTable();
            table.destroy();
            let arrColor = ['orange','yellow','olive','green','teal','blue','violet','purple','pink','brown','grey','black'];
            let color = "";
            
            $('#tableUsuarios').DataTable({
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json" },
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
                            return '<a type="button" id="linkUsuario"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        mRender: function (data, type, full) {
                            // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                            return (full.apellido != "" ? full.apellido : 'No hay apellidos');
                          }
                    },
                    {
                        mRender: function (data, type, full) {
                            return "<button id='editar' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil'></i></button>";
                        },
                        width: "8%",
                    },
                    {
                        mRender: function (data, type, full) {
                            return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteUsuario(' + full.idUsuario + ')"/><i class="fa fa-trash"></i></button>';
                        },
                        width: "8%",
                    }]
            });
        }).catch(function (error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
    
}

function loadData(data) {

    $('#HFCommandName').val('EDITAR');
    $('#HFIdUsuario').val(data.idUsuario);
    $('#txtNombre').val(data.nombre);
    $('#txtApellido').val(data.apellido);

}

function saveUsuario() {

  let idUsuario = $('#HFIdUsuario').val() != '' ? $('#HFIdUsuario').val() : '',
  params = {
    HFCommandName: $('#HFCommandName').val(),
    idUsuario: idUsuario,
    nombre: $('#txtNombre').val(),
    apellido: $('#txtApellido').val()
  };
fetch('./api/usuariosApi.php', {
  method: "POST",
  body: JSON.stringify({ 'saveUsuario': params }),
  dataType: "JSON"
})
  .then(response => {
    return response.json();
  })
  .then(response => {
    getUsuarios();
    $('#mdAltaEdicion').modal('hide');
    $('body').toast({
      class: 'success',
      message: `Usuario guardado correctamente !`
    });
  }).catch(error => {
    $('body').toast({ class: 'error', message: `An error occured !` + error.message });
  });

}

function deleteUsuario(idUsuario) {
    $('#domtoastactions')
      .toast({
        displayTime: 0,
        onDeny: function () {
          // $('body').toast({message:'Wait not yet!'});
          // return false;
        },
        onApprove: function () {
          fetch('./api/usuariosApi.php', {
            method: "POST",
            body: JSON.stringify({ 'deleteUsuario': { idUsuario: idUsuario } }),
            dataType: "JSON"
          })
            .then(response => {
              return response.json();
            })
            .then(response => {
              getUsuarios();
              $('#mdAltaEdicion').modal('hide');
              $('body').toast({
                class: 'success',
                message: 'Usuario eliminado correctamente !'
              });
            }).catch(error => {
              $('body').toast({ class: 'error', message: `An error occured !` + error.message });
            });
  
        }
      });
}
