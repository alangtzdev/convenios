$(() => {
    getCatalogos();
    getTipoCatalogos();

    $('#btnNuevoCatalogo').click(function () {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formCatalogos').form({
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
        saveCatalogo();
        return false;
      }
    });

    $('#tableCatalogos tbody').on('click', '#linkCatalogo', function () {
      var table = $('#tableCatalogos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tableCatalogos tbody').on('click', '#editar', function () {
      var table = $('#tableCatalogos').DataTable();
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
          $('#idArchivo').attr('disable', true);
          $('.ui.dropdown.selection').addClass('disabled');
          $("#mdAltaEdicion :input").each(function (index) {
            $(this).attr('readonly', true);
          });
        } else if (command == 'EDITAR'){

          $('#txtTitle').text('EDITAR');

        }
      },
      onHide: function () {
        $('#HFIdCatalogo').val('');
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
function getCatalogos() {
  waitMeShow('#idDivBody');
    fetch('./api/catalogosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getCatalogos': {} }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            var table = $('#tableCatalogos').DataTable();
            table.destroy();
            let arrColor = ['orange','yellow','olive','green','teal','blue','violet','purple','pink','brown','grey','black'];
            let color = "";
            
            $('#tableCatalogos').DataTable({
                language: { "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json" },
                data: response,
                buttons: ['pdf'],
                columnDefs: [
                    { "bSortable": false, "aTargets": [3, 4] },
                    {
                        className: "dt-center",
                        "targets": "_all"
                    }],
                columns: [
                    {
                        data: "nombreTipoCatalogo",
                        mRender: function (data, type, full) {
                            return '<label class="ui ' +arrColor[full.idTipoCatalogo]+ ' tag label"><strong>' + data + '</strong></label>';
                        }
                    },
                    {
                        data: "nombre",
                        mRender: function (data, type, full) {
                            return '<a type="button" id="linkCatalogo"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        mRender: function (data, type, full) {
                            // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                            return (full.descripcion != "" ? full.descripcion : 'No hay descripcion');
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
                            return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteContrato(' + full.idCatalogo + ')"/><i class="fa fa-trash"></i></button>';
                        },
                        width: "8%",
                    }]
            });
            waitMeHide('#idDivBody');
        }).catch(function (error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}
function getTipoCatalogos() {
    fetch('./api/catalogosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getTiposCatalogos': { } }),
        dataType: "JSON"
      })
        .then(response => {
          return response.json();
        })
        .then(response => {
    
          $(response).each(function (index, element) {
    
              $('#idCategoriaMd').append($('<option>').text(element.nombre).attr('value', element.idtipoCatalogo));
    
          });
          // waitMeHide('#divBody');
    
        }).catch(function (error) {
          console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}
function saveCatalogo() {

    let idCatalogo = $('#HFIdCatalogo').val() != '' ? $('#HFIdCatalogo').val() : '',
    params = {
      HFCommandName: $('#HFCommandName').val(),
      idCatalogo: idCatalogo,
      nombre: $('#txtNombre').val(),
      descripcion: $('#txtDescripcion').val(),
      idTipoCatalogo: $('#idCategoriaMd').val() == "" ? null : $('#idCategoriaMd').val(),
    };
  fetch('./api/catalogosApi.php', {
    method: "POST",
    body: JSON.stringify({ 'saveCatalogo': params }),
    dataType: "JSON"
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      getCatalogos();
      $('#mdAltaEdicion').modal('hide');
      $('body').toast({
        class: 'success',
        message: `Catalogo guardado correctamente !`
      });
    }).catch(error => {
      $('body').toast({ class: 'error', message: `An error occured !` + error.message });
    });

}

function loadData(data) {
  $('#HFCommandName').val('EDITAR');
  $('#HFIdCatalogo').val(data.idCatalogo);
  $('#txtNombre').val(data.nombre);
  $('#txtDescripcion').val(data.descripcion);
  $('#idCategoriaMd').dropdown('set selected',data.idTipoCatalogo);
}

function deleteCatalogo(idCatalogo) {
  $('#domtoastactions')
    .toast({
      displayTime: 0,
      onDeny: function () {
        // $('body').toast({message:'Wait not yet!'});
        // return false;
      },
      onApprove: function () {
        fetch('./api/catalogosApi.php', {
          method: "POST",
          body: JSON.stringify({ 'deleteCatalogo': { idCatalogo: idCatalogo } }),
          dataType: "JSON"
        })
          .then(response => {
            return response.json();
          })
          .then(response => {
            getCatalogos();
            $('#mdAltaEdicion').modal('hide');
            $('body').toast({
              class: 'success',
              message: 'Catalogo eliminado correctamente !'
            });
          }).catch(error => {
            $('body').toast({ class: 'error', message: `An error occured !` + error.message });
          });

      }
    });
}