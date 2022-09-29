$(function () {
  getAccesos();
  getRoles();
  getPermisos();
  $('#btnNuevoAcceso').click(function () {
    mdAltaEdicion($(this).data('command'));
  });

  $('#formAccesos').form({
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


  // $('#idRolMd').dropdown({
  //   // on: 'blur',
  //   // allowReselection: true,
  //   onChange:  function(val) {
  //     alert(val)
  //   }
  // });
});

function mdAltaEdicion(command) {
  $('#mdAltaEdicion')
    .modal({
      closable: false,
      onShow: function () {
        $(".ddRolMd").dropdown({
          allowAdditions: true,
          allowReselection: true,
          onChange: function (value) {
            // $('.ddModuloMd').dropdown();
            getModulosRol(value);
          }
        });
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
        } else if (command == 'EDITAR') {

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
      let arrColor = ['orange', 'yellow', 'olive', 'green', 'teal', 'blue', 'violet', 'purple', 'pink', 'brown', 'grey', 'black'];
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
            data: "rol",
            mRender: function (data, type, full) {
              return '<a type="button" id="linkAcceso"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
            }
          },
          {
            data: "modulo"
          },
          {
            data: "perxAcceso"
          },
          {
            mRender: function (data, type, full) {
              return "<button id='editar' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil-alt'></i></button>";
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
function getModulosRol(idRol) {
  // waitMeShow(selector);
  let params = {
    // idUsuario: parseInt(Cookies.get('idUsuario')),
    idRol: parseInt(idRol)
  };
  fetch('./api/modulosRolApi.php', {
    method: 'POST',
    body: JSON.stringify({ 'getModulosRol': params }),
    dataType: 'JSON'
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      if (Array.isArray(response)) {
        
        $(response).each(function (index, element) {
          // $('#idPaisMD').addClass('fluid search');
          $('#idModuloMd').append($('<option>').text(element.nombre).attr('value', element.idModulo_Rol));
  
        });
      } else{
        // $('.ddModuloMd').find('option').remove().end().append('<option>').text(response).attr('value', '');
        $('.ddModuloMd').find('option').remove().end();
        $('.ddModuloMd > div.text').text(response).addClass('default');
      }
    }).catch(e => {
      $('body').toast({
        class: 'error',
        message: e.message
      });
    });
}
function loadData(data) {
  let arrPermisos = [];
  arrPermisos.push((data.idsPerxAcceso).split(","));
  $('#HFCommandName').val('EDITAR');
  $('#HFIdAcceso').val(data.idAcceso);
  $('#idRolMd').dropdown('set selected',data.idRol);
  $('#idModuloMd').dropdown('set selected',data.idModulo_rol);
  for (let index = 0; index < arrPermisos[0].length; index++) {
    $("input[name=permisos]").each(function () {
      if ((this.value).trim() === arrPermisos[0][index]) {
        $(this).prop('checked', true);
        $(this).prop('disabled', false);
      }
    });
  }

}
function saveAcceso() {

  let idAcceso = $('#HFIdAcceso').val() != '' ? $('#HFIdAcceso').val() : '',
   arrPermisos = getArrPermisos();
    params = {
      HFCommandName: $('#HFCommandName').val(),
      idAcceso: idAcceso,
      idRol: $('#idRolMd').val(),
      idModuloRol: $('#idModuloMd').val(),
      arrPermisos: arrPermisos,
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
function getPermisos() {
  fetch('./api/permisosApi.php', {
    method: 'POST',
    body: JSON.stringify({ 'getPermisos': {} }),
    dataType: 'JSON'
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      let jdata = response;
      $('#divPermisos').html('');

      let divWide = 0;
      let htmlDiv = '';
      let $newDiv = $('<div class="fields"></div>');
      $.each(jdata, function (i, value) {
        htmlDiv = '<div class="four wide field">' +
          '<div class="ui toggle checkbox">' +
          '<input type="checkbox" value="' + value.idpermiso + '"  name="permisos">' +
          '<label>' + value.nombre + '</label>' +
          '</div>' +
          '</div>';
        var ok = $(htmlDiv).appendTo($newDiv);
        $('#divPermisos').html($('#divPermisos').html() + htmlDiv);
      });

    }).catch(e => { });
}
function getArrPermisos() {
  let arrIdsPermisos = [];
  $("input[name=permisos]:checked").each(function () {
    arrIdsPermisos.push(parseInt($(this).val()));
  });
  return arrIdsPermisos;

}