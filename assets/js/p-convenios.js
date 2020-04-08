$(function () {

  getConvenios();
  getCatalogos();


  $('#btnNuevoConvenio').click(function () {
    var button = this;
    $('#mdAltaEdicion')
      .modal({
        closable: false,
        onShow: function () {
          if (event.target.tagName != "INPUT") {
            $('#HFCommandName').val(button.dataset.command);
          }
        },
        onHide: function () {
          //Resets form input fields
          $('.ui.form').trigger("reset");
          //Resets form error messages
          $('.ui.form .field.error').removeClass("error");
          $('.ui.form.error').removeClass("error");
        },
        onApprove: function () {
          $('.ui.form').submit();
          return false;
        }
      }).modal('show');
  });

  $('#formConvenios')
    .form({
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
        alert("si entro aqui a valer verga ");
      }
    });

});
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
          { data: text_truncate("descripcion", 19) 
          },
          {
            data: "fechaInicio"
          },
          {
            mRender: function (data, type, full) {
              return full.isIndefinida == 0 ? full.fechaFin : "Indefinida";
            }
          },
          {
            mRender: function (data, type, full) {
              return "<button data-toggle='modal' title='Editar' id='btnNuevoConvenio' type='button' class='ui violet icon button' data-toggle='modal' data-target='#mdAltaEdicion' data-command='EDITAR'/><i class='fa fa-pencil'></i></button>";
            },
            width: "8%",
          },
          {
            mRender: function (data, type, full) {
              return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteArea(' + full.idArea + ')"/><i class="fa fa-trash"></i></button>';
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
  fetch('./api/catalogosApi.php',{
    method: "POST",
    body: JSON.stringify({'getCatalogos': {id:1}}),
    dataType: "JSON"
  })
    .then(function(response) {
      return response.json();
    })
    .then(function(myJson) {
      console.log(myJson);
    }).catch(function(error) {
      console.log('Hubo un problema con la petición Fetch:' + error.message);
    });
}
function saveConvenio(params) {

  
}


// function getTest() {
//    let params = { idUsuario: 1 };
//      fetch('./api/conveniosApi.php', { method:  'POST', 
//     body: {"getConvenios" : params}}
//      )
//   .then(function(response) {
//     return response.json();
//   })
//   .then(function(myJson) {
//     console.log(myJson);
//   });

//   }

//               on: 'blur',
//             inline: true,
//             onSuccess: function() {
//               alert('Success');
//               return false; // false is required if you do don't want to let it submit

//               },
//               onFailure: function() {
//               alert('Failure');
//               return false; // false is required if you do don't want to let it submit                                            
//               }
//             });
// });