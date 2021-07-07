$(function () {
  getRoles();
  getModulos();
  $('#btnNuevoRol').click(function () {
    mdAltaEdicion($(this).data('command'));
  });
  $('#formRoles').form({
    on: 'blur',
    fields: {
      empty: {
        identifier: 'rol',
        rules: [
          {
            type: 'empty',
            prompt: 'El nombre del rol es obligatorio'
          }
        ]
      }
    },
    onSuccess: function () {
      saveRol();
      return false;
    }
  });

  $('#tableRoles tbody').on('click', '#linkRol', function () {
    var table = $('#tableRoles').DataTable();
    var data = table.row($(this).parents('tr')).data();
    mdAltaEdicion($(this).data('command'));
    loadData(data, $(this).data('command'));
  });

  $('#tableRoles tbody').on('click', '#editar', function () {
    var table = $('#tableRoles').DataTable();
    var data = table.row($(this).parents('tr')).data();
    mdAltaEdicion($(this).data('command'));
    loadData(data, $(this).data('command'));
  });

});
function getRoles() {
  waitMeShow('#idDivBody');
  fetch('./api/rolesApi.php', {
    method: "POST",
    body: JSON.stringify({ 'getRoles': {} }),
    dataType: "JSON"
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      var table = $('#tableRoles').DataTable();
      table.destroy();
      let arrColor = ['orange', 'yellow', 'olive', 'green', 'teal', 'blue', 'violet', 'purple', 'pink', 'brown', 'grey', 'black'];
      let color = "";
      $('#tableRoles').DataTable({
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
              return '<a type="button" id="linkRol"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
            }
          },
          {
            data: "descripcion"
          },
          {
            data: "estatus"
          },
          {
            mRender: function (data, type, full) {
              return "<button id='editar' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil'></i></button>";
            },
            width: "8%",
          },
          {
            mRender: function (data, type, full) {
              return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteRol(' + full.idRol + ')"/><i class="fa fa-trash"></i></button>';
            },
            width: "8%",
          }]
      });
      waitMeHide('#idDivBody');
    }).catch(function (error) {
      console.log('Hubo un problema con la petición Fetch:' + error.message);
    });


}
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
        } else if (command == 'EDITAR') {

          $('#txtTitle').text('EDITAR');
        }
      },
      onHide: function () {
        $('#HFIdRol').val('');
        $('.ui.form').form('reset');
        $('.ui.form .field.error').removeClass("error");
        $('.ui.form.error').removeClass("error");
        $('.ui.form :input').attr('readonly', false);
        $('.ui.dropdown.selection').removeClass('disabled');
        $("input[name=modulos]").prop('checked', false);
        $("input[name=modulos]").prop('disabled', false);
      },
      onApprove: function () {
        $('.ui.form').form('submit');
        return false;
      }
    }).modal('show');
}
function loadData(data) {
  let arrModulos = [];
  arrModulos.push((data.modulosxrol).split(","));
  $('#HFCommandName').val('EDITAR');
  $('#HFIdRol').val(data.idRol);
  $('#txtRol').val(data.rol);
  $('#txtDescripcion').val(data.descripcion);
  if (data.estatus) { $('#chkIsEstatus').prop('checked', true); }

  for (let index = 0; index < arrModulos[0].length; index++) {
    console.log(arrModulos[0][index]);
    $("input[name=modulos]").each(function () {
      if ((this.value).trim() === arrModulos[0][index]) {
        $(this).prop('checked', true);
        $(this).prop('disabled', false);
      }
    });
  }

}
function saveRol() {
  let idRol = $('#HFIdRol').val() != '' ? $('#HFIdRol').val() : '';
  let arrModulos = getArrModulos();
  params = {
    HFCommandName: $('#HFCommandName').val(),
    idRol: idRol,
    rol: $('#txtRol').val(),
    descripcion: $('#txtDescripcion').val(),
    estatus: $('#chkIsEstatus').is(':checked') == true ? 1 : 0,
    modulos: arrModulos
  };
  fetch('./api/rolesApi.php', {
    method: "POST",
    body: JSON.stringify({ 'saveRol': params }),
    dataType: "JSON"
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      getRoles();
      $('#mdAltaEdicion').modal('hide');
      $('body').toast({
        class: 'success',
        message: `Rol guardado correctamente !`
      });
    }).catch(error => {
      $('body').toast({ class: 'error', message: `An error occured !` + error.message });
    });


}
function getArrModulos() {
  let arrIdsModulos = [];
  $("input[name=modulos]:checked").each(function () {
    arrIdsModulos.push(parseInt($(this).val()));
  });
  return arrIdsModulos;

}
function getModulos() {
  fetch('./api/modulosApi.php', {
    method: 'POST',
    body: JSON.stringify({ 'getModulos': {} }),
    dataType: 'JSON'
  })
    .then(response => {
      return response.json();
    })
    .then(response => {
      let jdata = response;
      $('#divModulosxRol').html('');

      let divWide = 0;
      let htmlDiv = '';
      let $newDiv = $('<div class="fields"></div>');
      $.each(jdata, function (i, value) {
        divWide += 1;
        if (divWide <= 4) {
          htmlDiv = '<div class="four wide field">' +
            '<div class="ui toggle checkbox">' +
            '<input type="checkbox" value="' + value.idmodulo + '"  name="modulos">' +
            '<label>' + value.nombre + '</label>' +
            '</div>' +
            '</div>';
          var ok = $(htmlDiv).appendTo($newDiv);
          $('#divModulosxRol').html($('#divModulosxRol').html() + htmlDiv);
        }
        if (i > 3 && i <= 7) {
          let htmlDiv = '';
          htmlDiv = '<div class="four wide field">' +
            '<div class="ui toggle checkbox">' +
            '<input type="checkbox" value="' + value.idmodulo + '"  name="modulos">' +
            '<label>' + value.nombre + '</label>' +
            '</div>' +
            '</div>';
          var ok = $(htmlDiv).appendTo($newDiv);
          $('#divModulosxRol1').html($('#divModulosxRol1').html() + htmlDiv);
        }
        if (i > 7 && i <= 11) {
          let htmlDiv = '';
          htmlDiv = '<div class="four wide field">' +
            '<div class="ui toggle checkbox">' +
            '<input type="checkbox" value="' + value.idmodulo + '"  name="modulos">' +
            '<label>' + value.nombre + '</label>' +
            '</div>' +
            '</div>';
          var ok = $(htmlDiv).appendTo($newDiv);
          $('#divModulosxRol2').html($('#divModulosxRol2').html() + htmlDiv);
        }
      });

    }).catch(e => { });
}
function deleteRol(idRol) {
  $('#domtoastactions')
    .toast({
      displayTime: 0,
      onDeny: function () {
        // $('body').toast({message:'Wait not yet!'});
        // return false;
      },
      onApprove: function () {
        fetch('./api/rolesApi.php', {
          method: "POST",
          body: JSON.stringify({ 'deleteRol': { idRol: idRol } }),
          dataType: "JSON"
        })
          .then(response => {
            return response.json();
          })
          .then(response => {
            getRoles();
            $('#mdAltaEdicion').modal('hide');
            $('body').toast({
              class: 'success',
              message: 'Rol eliminado correctamente !'
            });
          }).catch(error => {
            $('body').toast({ class: 'error', message: `An error occured !` + error.message });
          });

      }
    });
}
