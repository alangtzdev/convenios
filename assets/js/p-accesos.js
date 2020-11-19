$(() => {
    getAccesos();
    getRoles();
    $('#btnNuevoAcceso').click(function () {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formAccesoes').form({
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
        saveAcceso();
        return false;
      }
    });

    $('#tableAccesos tbody').on('click', '#linkAcceso', function () {
      var table = $('#tableAccesos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tableAccesos tbody').on('click', '#editar', function () {
      var table = $('#tableAccesos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });
    
    $("#idRolMd").dropdown({
      allowAdditions: true,
        allowReselection: true,
      action:function(value,text){
        console.log("a");
      }
    });
    // $('#idRolMd').dropdown({
    //   // on: 'blur',
    //   // allowReselection: true,
    //   onChange:  function(val) {
    //     alert(val)
    //   }
    // });
});
function copy() { 
  getModulos(console.log(document.getElementById("idRolMd").value));
}

function mdAltaEdicion(command) {
    $('#mdAltaEdicion')
    .modal({
      closable: false,
      onShow: function () {
        $("#idRolMd").dropdown('refresh');
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
        $('#HFIdAcceso').val('');
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
function getAccesos() {
  waitMeShow('#idDivBody');
    fetch('./api/accesosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getAccesos': {} }),
        dataType: "JSON"
    })
        .then(response => {
            return response.json();
        })
        .then(response => {
            var table = $('#tableAccesos').DataTable();
            table.destroy();
            let arrColor = ['orange','yellow','olive','green','teal','blue','violet','purple','pink','brown','grey','black'];
            let color = "";
            
            $('#tableAccesos').DataTable({
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
                            return '<a type="button" id="linkAcceso"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
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
                            return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteAcceso(' + full.idAcceso + ')"/><i class="fa fa-trash"></i></button>';
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
function getModulos() {
  fetch('./api/rolesApi.php', {
    method: "POST",
    body: JSON.stringify({ 'getModulos_Rol': {} }),
    dataType: "JSON"
  })
    .then(function (response) {
      return response.json();
    })
    .then(response => {
      // let datos =  JSON.parse(response);

      $(response).each(function (index, element) {
          // $('#idPaisMD').addClass('fluid search');
          $('#idModuloMd').append($('<option>').text(element.rol).attr('value', element.idRol));
        
      });


    }).catch(function (error) {
      console.log('Hubo un problema con la petición Fetch:' + error.message);
    });
}
function loadData(data) {

    $('#HFCommandName').val('EDITAR');
    $('#HFIdAcceso').val(data.idAcceso);
    $('#txtNombre').val(data.nombre);
    $('#txtAbreviacion').val(data.abreviacion);

}
function onChange(cal) {
alert(cal);  
}
function saveAcceso() {

  let idAcceso = $('#HFIdAcceso').val() != '' ? $('#HFIdAcceso').val() : '',
  params = {
    HFCommandName: $('#HFCommandName').val(),
    idAcceso: idAcceso,
    nombre: $('#txtNombre').val(),
    abreviacion: $('#txtAbreviacion').val()
  };
fetch('./api/accesosApi.php', {
  method: "POST",
  body: JSON.stringify({ 'saveAcceso': params }),
  dataType: "JSON"
})
  .then(response => {
    return response.json();
  })
  .then(response => {
    getAccesos();
    $('#mdAltaEdicion').modal('hide');
    $('body').toast({
      class: 'success',
      message: `Acceso guardado correctamente !`
    });
  }).catch(error => {
    $('body').toast({ class: 'error', message: `An error occured !` + error.message });
  });

}

function deleteAcceso(idAcceso) {
    $('#domtoastactions')
      .toast({
        displayTime: 0,
        onDeny: function () {
          // $('body').toast({message:'Wait not yet!'});
          // return false;
        },
        onApprove: function () {
          fetch('./api/accesosApi.php', {
            method: "POST",
            body: JSON.stringify({ 'deleteAcceso': { idAcceso: idAcceso } }),
            dataType: "JSON"
          })
            .then(response => {
              return response.json();
            })
            .then(response => {
              getAccesos();
              $('#mdAltaEdicion').modal('hide');
              $('body').toast({
                class: 'success',
                message: 'Acceso eliminado correctamente !'
              });
            }).catch(error => {
              $('body').toast({ class: 'error', message: `An error occured !` + error.message });
            });
  
        }
      });
}
