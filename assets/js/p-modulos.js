$(() => {
    getModulos();
    
    $('#btnNuevoModulo').click(function () {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formModulos').form({
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
        saveModulo();
        return false;
      }
    });

    $('#tableModulos tbody').on('click', '#linkModulo', function () {
      var table = $('#tableModulos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tableModulos tbody').on('click', '#editar', function () {
      var table = $('#tableModulos').DataTable();
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
        $('#HFIdModulo').val('');
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
function getModulos() {
  waitMeShow('#idDivBody');
    fetch('./api/modulosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getModulos': {} }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            var table = $('#tableModulos').DataTable();
            table.destroy();
            let arrColor = ['orange','yellow','olive','green','teal','blue','violet','purple','pink','brown','grey','black'];
            let color = "";
            
            $('#tableModulos').DataTable({
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
                            return '<a type="button" id="linkModulo"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
                        }
                    },
                    // {
                    //     mRender: function (data, type, full) {
                    //         // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                    //         return (full.apellido != "" ? full.apellido : 'No hay apellidos');
                    //       }
                    // },
                    {
                        data: "modulo"
                    },
                    {
                      data: "enlace"
                    },
                    {
                      data: "icon"
                    },
                    {
                        mRender: function (data, type, full) {
                            return "<button id='editar' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil-alt'></i></button>";
                        },
                        width: "8%",
                    },
                    {
                        mRender: function (data, type, full) {
                            return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteModulo(' + full.idModulo + ')"/><i class="fa fa-trash"></i></button>';
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
    $('#HFIdModulo').val(data.idModulo);
    $('#txtNombre').val(data.nombre);
    $('#txtApellido').val(data.apellido);
    $('#idRolMd').dropdown('set selected',data.idRol);
    $('#txtCorreo').val(data.correo);
    $('#txtModulo').val(data.usuario);
    if(data.isResponsable) { $('#chkIsResp').prop('checked', true); }

}

function saveModulo() {

  let idModulo = $('#HFIdModulo').val() != '' ? $('#HFIdModulo').val() : '',
  params = {
    HFCommandName: $('#HFCommandName').val(),
    idModulo: idModulo,
    nombre: $('#txtNombre').val(),
    modulo: $('#txtIndice').val(),
    // idRol: $('#idRolMd').val(),
    // correo: $('#txtCorreo').val(),
    // usuario: $('#txtModulo').val(),
    // isResponsable: $('#chkIsResp').is(':checked') == true ? 1 : 0 , 
  };
fetch('./api/modulosApi.php', {
  method: "POST",
  body: JSON.stringify({ 'saveModulo': params }),
  dataType: "JSON"
})
  .then(response => {
    return response.json();
  })
  .then(response => {
    getModulos();
    $('#mdAltaEdicion').modal('hide');
    $('body').toast({
      class: 'success',
      message: `Modulo guardado correctamente !`
    });
  }).catch(error => {
    $('body').toast({ class: 'error', message: `An error occured !` + error.message });
  });

}

function deleteModulo(idModulo) {
    $('#domtoastactions')
      .toast({
        displayTime: 0,
        onDeny: function () {
          // $('body').toast({message:'Wait not yet!'});
          // return false;
        },
        onApprove: function () {
          fetch('./api/modulosApi.php', {
            method: "POST",
            body: JSON.stringify({ 'deleteModulo': { idModulo: idModulo } }),
            dataType: "JSON"
          })
            .then(response => {
              return response.json();
            })
            .then(response => {
              getModulos();
              $('#mdAltaEdicion').modal('hide');
              $('body').toast({
                class: 'success',
                message: 'Modulo eliminado correctamente !'
              });
            }).catch(error => {
              $('body').toast({ class: 'error', message: `An error occured !` + error.message });
            });
  
        }
      });
}
