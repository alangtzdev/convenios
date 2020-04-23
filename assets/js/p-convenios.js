$(function () {
  getConvenios();
  getCatalogos();

  $('#tableConvenios tbody').on('click', '#perro', function () {
    var table = $('#tableConvenios').DataTable();
    var data = table.row($(this).parents('tr')).data();
    mdAltaEdicion($(this).data('command'));
    loadData(data, $(this).data('command'));
  });

  $('#btnNuevoConvenio').click(function () {
    mdAltaEdicion($(this).data('command'));
  });

  $('#formConvenios').form({
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
      // event.preventDefault();
      saveConvenio();
      return false;
    }
  });

  $('#chkIndefinida').on('change', function () {
    if ($('#chkIndefinida').is(':checked')) {
      $('#divFechaFin :input').attr('disabled', true);
    }
    else {
      $('#divFechaFin :input').attr('disabled', false);
    }
  });
  $('#divFechaFin :input').attr('disabled', false);

});
function mdAltaEdicion(command) {
  $('#mdAltaEdicion')
    .modal({
      closable: false,
      onShow: function () {
        $('#divFechaFirma').calendar({
          type: 'date',
          startMode: 'year',
          //   formatter: {
          //     date: function (date, settings) {
          //         if (!date) return '';
          //         var day = date.getDate() + '';
          //         if (day.length < 2) {
          //             day = '0' + day;
          //         }
          //         var month = (date.getMonth() + 1) + '';
          //         if (month.length < 2) {
          //             month = '0' + month;
          //         }
          //         var year = date.getFullYear();
          //         return year + '-' + month + '-' + day;
          //     }
          // }
        });
        $('#divFechaFin').calendar({
          type: 'date',
          startMode: 'year'
        });
        $('#HFCommandName').val(command);
        // if (event.target.tagName != "INPUT") {
        // }

      },
      onHide: function () {
        $('#HFIdConvenio').val('');
        //Resets form input fieldsz
        // $('.ui.form').trigger("reset");
        $('.ui.form').form('reset');
        //Resets form error messages
        $('.ui.form .field.error').removeClass("error");
        $('.ui.form.error').removeClass("error");
      },
      onApprove: function () {
        $('.ui.form').form('submit');
        return false;
      }
    }).modal('show');
}
function getConvenios() {
  // waitMeShow('#divBody');
  var params = { idUsuario: 1 };
  $.ajax({
    type: "POST",
    url: "./api/conveniosApi.php",
    data: { "getConvenios": params },
    dataType: "json",
    success: function (response) {
      var table = $('#tableConvenios').DataTable();
      table.destroy();
      $('#tableConvenios').DataTable({
        language: { "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json" },
        data: response,
        buttons: ['pdf'],
        columnDefs: [{
          className: "dt-center dt-body-center",
          "targets": "_all"
        }],
        columns: [
          { data: "nombre" },
          {
            data: text_truncate("descripcion", 19)
          },
          {
            data: "fechaFirma"
          },
          {
            mRender: function (data, type, full) {
              return full.isIndefinida == 0 ? full.fechaFin : "Indefinida";
            }
          },
          {
            mRender: function (data, type, full) {
              return "<button id='perro' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil'></i></button>";
            },
            width: "8%",
          },
          {
            mRender: function (data, type, full) {
              return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteConvenio(' + full.idConvenio + ')"/><i class="fa fa-trash"></i></button>';
            },
            width: "8%",
          }]
      });
      // waitMeHide('#divBody');
    },
    error: function (data) {
      // waitMeHide('#divBody');
      var dataError = data.responseText;
      // swal("Cancelled", dataError + " !", "error");
    }
  });
}
function getCatalogos() {
  fetch('./api/catalogosApi.php', {
    method: "POST",
    body: JSON.stringify({ 'getCatalogos': { id: 1 } }),
    dataType: "JSON"
  })
    .then(function (response) {
      return response.json();
    })
    .then(response => {
      let ambito = 1, programa = 2, convenio = 3, origen = 4;

      $(response).each(function (index, element) {

        if (ambito == element.idTipoCatalogo) {

          $('#idAmbitoMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

        } else if (programa == element.idTipoCatalogo) {

          $('#idProgramaMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

        } else if (convenio == element.idTipoCatalogo) {

          $('#idTipoConvenioMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

        } else {

          $('#idOrigenMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
        }
      });
      // waitMeHide('#divBody');

    }).catch(function (error) {
      console.log('Hubo un problema con la petición Fetch:' + error.message);
    });
}
function saveConvenio() {
  console.log("TAMO ACTIVOS");
  
  var fromDate = new Date($("#Date_From").val());
  let idConvenio = $('#HFIdConvenio').val() != '' ? $('#HFIdConvenio').val() : '',
    params = {
      HFCommandName: $('#HFCommandName').val(),
      idConvenio: idConvenio,
      nombre: $('#txtNombre').val(),
      descripcion: $('#txtDescripcion').val(),
      fechaFirma: $('#fechaFirma').val(),
      isIndefinida: $('#chkIndefinida').is(':checked'),
      fechaFin: $('#fechaFin').val(),
      idPrograma: $('#idProgramaMd').val(),
      idContraparte: 1, //$('#idContraparteMd').val(),
      idAmbito: $('#idAmbitoMd').val(),
      idOrigen: $('#idOrigenMd').val(),
      idTipoConvenio: $('#idTipoConvenioMd').val(),
      idResponsable: 6,//$('#idResponsableMd').val(),
      financiamiento: $('#txtFinaciamiento').val(),
      idPais: 2//$('#idPaisMd').val(),
    };
  fetch('./api/conveniosApi.php', {
    method: "POST",
    body: JSON.stringify({ 'saveConvenio': params }),
    dataType: "JSON"
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      getConvenios();
      $('#mdAltaEdicion').modal('hide');
      $('body').toast({
        class: 'success',
        message: `Convenio guardado correctamente !`
      });
    }).catch(error => {
      $('body').toast({ class: 'error', message: `An error occured !` + error.message });

    });

}

function loadData(data) {

  const dateFirma = new Date(data.fechaFirma);
  const _fechaFirma = new Date(dateFirma.getFullYear(), dateFirma.getMonth(), dateFirma.getDate() + 1);
  // Getting required values
  // const year = today.getFullYear()
  // const month = today.getMonth()
  // const day = today.getDate()
  
  // Creating a new Date (with the delta)
  $('#HFCommandName').val('EDITAR');
  $('#HFIdConvenio').val(data.idConvenio);
  $('#txtNombre').val(data.nombre);
  $('#txtDescripcion').val(data.descripcion);
  $('#divFechaFirma').calendar('set date',_fechaFirma.toDateString(), updateInput = true, fireChange = true);
  $('#idProgramaMd').dropdown('set selected',data.idPrograma);
  $('#idContraparteMd').val(2);
  $('#idAmbitoMd').dropdown('set selected',data.idAmbito);
  $('#idOrigenMd').dropdown('set selected',data.idOrigen);
  $('#idTipoConvenioMd').dropdown('set selected',data.idTipoConvenio);
  $('#txtFinaciamiento').val(data.financiamiento);
  $('#idPaisMd').val(1);
  $('#idResponsableMd').val(10);
  if (data.isIndefinida) {
    $('#chkIndefinida').prop('checked', true);
  }
  if (data.fechaFin !== '') {
    const dateFinal = new Date(data.fechaFin);
    const _fechaFin = new Date(dateFinal.getFullYear(), dateFinal.getMonth(), dateFinal.getDate() + 1);
    $('#divFechaFin').calendar('set date',_fechaFin.toDateString(), updateInput = true, fireChange = true);
  }   
  // $('#formConvenios :input")').addClass("edited");
}

function deleteConvenio(idConvenio) {
  $('#domtoastactions')
    .toast({
      displayTime: 0,
      onDeny: function () {
        // $('body').toast({message:'Wait not yet!'});
        // return false;
      },
      onApprove: function () {
        fetch('./api/conveniosApi.php', {
          method: "POST",
          body: JSON.stringify({ 'deleteConvenio': { idConvenio: idConvenio } }),
          dataType: "JSON"
        })
          .then(response => {
            return response.json();
          })
          .then(response => {
            getConvenios();
            $('#mdAltaEdicion').modal('hide');
            $('body').toast({
              class: 'success',
              message: 'Convenio eliminado correctamente !'
            });
          }).catch(error => {
            $('body').toast({ class: 'error', message: `An error occured !` + error.message });
          });

      }
    });
}






//               onFailure: function() {
//               alert('Failure');
//               return false; // false is required if you do don't want to let it submit                                            
//               }
//             });
// });