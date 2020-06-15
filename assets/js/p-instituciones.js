$(() => {
    getInstituciones();

    $('#btnNuevoInstitucion').click(function () {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formInstituciones').form({
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
        saveInstitucion();
        return false;
      }
    });

    $('#tableInstituciones tbody').on('click', '#linkInstitucion', function () {
      var table = $('#tableInstituciones').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tableInstituciones tbody').on('click', '#editar', function () {
      var table = $('#tableInstituciones').DataTable();
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
        $('#HFIdInstitucion').val('');
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
function getInstituciones() {
    fetch('./api/institucionesApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getInstituciones': {} }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            var table = $('#tableInstituciones').DataTable();
            table.destroy();
            let arrColor = ['orange','yellow','olive','green','teal','blue','violet','purple','pink','brown','grey','black'];
            let color = "";
            
            $('#tableInstituciones').DataTable({
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
                            return '<a type="button" id="linkInstitucion"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        mRender: function (data, type, full) {
                            // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                            return (full.abreviacion != "" ? full.abreviacion : 'No hay abreviacion');
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
                            return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteInstitucion(' + full.idInstitucion + ')"/><i class="fa fa-trash"></i></button>';
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
    $('#HFIdInstitucion').val(data.idInstitucion);
    $('#txtNombre').val(data.nombre);
    $('#txtAbreviacion').val(data.abreviacion);

}

function saveInstitucion() {

  let idInstitucion = $('#HFIdInstitucion').val() != '' ? $('#HFIdInstitucion').val() : '',
  params = {
    HFCommandName: $('#HFCommandName').val(),
    idInstitucion: idInstitucion,
    nombre: $('#txtNombre').val(),
    abreviacion: $('#txtAbreviacion').val()
  };
fetch('./api/institucionesApi.php', {
  method: "POST",
  body: JSON.stringify({ 'saveInstitucion': params }),
  dataType: "JSON"
})
  .then(response => {
    return response.json();
  })
  .then(response => {
    getInstituciones();
    $('#mdAltaEdicion').modal('hide');
    $('body').toast({
      class: 'success',
      message: `Institucion guardado correctamente !`
    });
  }).catch(error => {
    $('body').toast({ class: 'error', message: `An error occured !` + error.message });
  });

}

function deleteInstitucion(idInstitucion) {
    $('#domtoastactions')
      .toast({
        displayTime: 0,
        onDeny: function () {
          // $('body').toast({message:'Wait not yet!'});
          // return false;
        },
        onApprove: function () {
          fetch('./api/institucionesApi.php', {
            method: "POST",
            body: JSON.stringify({ 'deleteInstitucion': { idInstitucion: idInstitucion } }),
            dataType: "JSON"
          })
            .then(response => {
              return response.json();
            })
            .then(response => {
              getInstituciones();
              $('#mdAltaEdicion').modal('hide');
              $('body').toast({
                class: 'success',
                message: 'Institucion eliminado correctamente !'
              });
            }).catch(error => {
              $('body').toast({ class: 'error', message: `An error occured !` + error.message });
            });
  
        }
      });
}
