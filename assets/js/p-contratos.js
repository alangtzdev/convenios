$(function () {

    getContratos();
    getCatalogos();
    getPaises();
    getResponsables();
    getContraparte();

    $("#txtFinaciamiento").on({
      "keyup": function(event) {
        $(event.target).val(function(index, value) {
          return value.replace(/[^0-9.-]+/g, "")
            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
      }
    });

// $("input").click(function () {
// 	alert("has hecho click en la imagen");
// });
  
    
    $('#tableContratos tbody').on('click', '#linkContrato', function () {
      var table = $('#tableContratos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });

    $('#tableContratos tbody').on('click', '#perro', function () {
      var table = $('#tableContratos').DataTable();
      var data = table.row($(this).parents('tr')).data();
      mdAltaEdicion($(this).data('command'));
      loadData(data, $(this).data('command'));
    });
  
    $('#btnNuevoContrato').click(function () {
      mdAltaEdicion($(this).data('command'));
    });
  
    $('#formContratos').form({
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
        saveContrato();
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
          });
          $('#divFechaFin').calendar({
            type: 'date',
            startMode: 'year'
          });
          $('.divProgress').progress();
          $('#btnGuardar').show();
          $('.divLabel').hide();
          $('.divInputUpload').show();
          $('#HFCommandName').val(command);
          $('#txtTitle').text('ALTA');

          if (command == 'CONSULTA') {
            $('.divLabel').show();
            $('#divArchiConsulFinanParcial').show();
            $('.divInputUpload').hide();
            $('#txtTitle').text('CONSULTA');
            $('#btnGuardar').hide();
            $('input[type="file"]').attr('disable', true);
            $('.ui.dropdown.selection').addClass('disabled');
            $('.ui.calendar :input').attr('disabled', true);
            $("#mdAltaEdicion :input").each(function (index) {

              $(this).attr('readonly', true);

            });
          } else if (command == 'EDITAR'){

            $('#txtTitle').text('EDITAR');
  
          }
        },
        onHide: function () {
          $.each($('input[type="file"]'), function (index, value) { 
             console.log(index,value.id,value.dataset.hfencryp); 
            cleanFile($('#'+value.id),$('#'+value.dataset.hfencryp),$('#'+value.dataset.hfruta));
          });
          $('#HFIdContrato').val('');
          $('.ui.form').form('reset');
          $('.ui.form .field.error').removeClass("error");
          $('.ui.form.error').removeClass("error");
          $('.ui.form :input').attr('readonly', false);
          $('.ui.dropdown.selection').removeClass('disabled');
          $('.ui.calendar :input').attr('disabled', false);
        },
        onApprove: function () {
          $('.ui.form').form('submit');
          return false;
        }
      }).modal('show');
  }
  function subir(id) {
    console.log($('#'+id).data('hfruta'));
    var file = document.getElementById(id);
    file.dispatchEvent(new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    }));
    $('#'+id).fileupload(new uploadFile('#'+$('#'+id).data('hfencryp'), '#'+$('#'+id).data('hfruta'), '#'+$('#'+id).data('idlblresult')));
  
  }
  function getContratos() {
    waitMeShow('#idDivBody');
    var params = { idUsuario: 1 };
    $.ajax({
      type: "POST",
      url: "./api/contratosApi.php",
      data: { "getContratos": params },
      dataType: "json",
      success: function (response) {
        var table = $('#tableContratos').DataTable();
        table.destroy();
        let arrColor = {'General' : 'orange','Específico':'olive','Contrato':'teal','Marco':'violet','Colaboración':'pink','Uso de Espacios':'brown'};
        $('#tableContratos').DataTable({
          language: { "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json" },
          data: response,
          buttons: ['pdf'],
          columnDefs: [
            { "bSortable": false, "aTargets": [ 4, 5 ] },
            {
                     className: "dt-center",
                     "targets": "_all"
         }],
          columns: [
            { data: "nombre",
            mRender: function (data, type, full) {
                return '<a type="button" id="linkContrato"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
            }
          },
          {
            data: "contraparte"
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
              data: "tipoConvenio",
              mRender: function (data, type, full) {
                  return '<label class="ui ' +arrColor[full.tipoConvenio]+ ' tag label"><strong>' + data + '</strong></label>';
              }
            },
            // {
            //   mRender: function (data, type, full) {
            //     // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
            //     return (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'Sin archivo');
            //   },
            //   width: "8%",
            // },
            {
              mRender: function (data, type, full) {
                // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                return (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'Sin archivo');
              },
              width: "8%",
            },
            {
              mRender: function (data, type, full) {
                // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                return ((full.rutaFinanParcial != "" ? '<a target="_blank"  href="' + full.rutaFinanParcial + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'S/P') +
                 " | " + (full.rutaFinanFinal != "" ? '<a target="_blank"  href="' + full.rutaFinanFinal + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'S/F'));
              },
              width: "10%",
            },
            {
              mRender: function (data, type, full) {
                // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                return ((full.rutaTecnicoParcial != "" ? '<a target="_blank"  href="' + full.rutaTecnicoParcial + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'S/P') +
                 " | " + (full.rutaTecnicoFinal != "" ? '<a target="_blank"  href="' + full.rutaTecnicoFinal + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'S/F'));
              },
              width: "10%",
            },              
            {
              mRender: function (data, type, full) {
                return "<button id='perro' type='button' class='ui violet icon button' data-command='EDITAR'/><i class='fa fa-pencil'></i></button>";
              },
              width: "8%",
            },
            {
              mRender: function (data, type, full) {
                return '<button data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button" onclick="deleteContrato(' + full.idContrato + ')"/><i class="fa fa-trash"></i></button>';
              },
              width: "8%",
            }]
        });
        waitMeHide('#idDivBody');
      },
      error: function (data) {
        waitMeHide('#idDivBody');
        var dataError = data.responseText;
        // swal("Cancelled", dataError + " !", "error");
      }
    });
  }
  function getPaises() {
    fetch('./api/paisesApi.php', {
      method: "POST",
      body: JSON.stringify({ 'getPaises': { id: 1 } }),
      dataType: "JSON"
    })
      .then(function (response) {
        return response.json();
      })
      .then(response => {
  
        $(response).each(function (index, element) {
            $('#idPaisMd').append($('<option>').text(element.nombre).attr('value', element.idPais));
          
        });
  
  
      }).catch(function (error) {
        console.log('Hubo un problema con la petición Fetch:' + error.message);
      });
  }
  function getResponsables() {
    fetch('./api/usuariosApi.php', {
      method: "POST",
      body: JSON.stringify({ 'getUsuarios': { id: 1 } }),
      dataType: "JSON"
    })
      .then(function (response) {
        return response.json();
      })
      .then(response => {
  
        $(response).each(function (index, element) { 
            $('#idResponsableMd').append($('<option>').text(element.nombre +' ' +element.apellido).attr('value', element.idUsuario));
          
        });
  
  
      }).catch(function (error) {
        console.log('Hubo un problema con la petición Fetch:' + error.message);
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
        let ambito = 1, programa = 2, convenio = 3, origen = 4, finesEspecificos = 5;
  
        $(response).each(function (index, element) {
  
          if (ambito == element.idTipoCatalogo) {
  
            $('#idAmbitoMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
  
          } else if (programa == element.idTipoCatalogo) {
  
            $('#idProgramaMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
  
          } else if (convenio == element.idTipoCatalogo) {
            if (element.nombre !== 'Uso de Espacios') {
              
              $('#idTipoConvenioMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
            }
  
  
          } else if (origen == element.idTipoCatalogo){

            $('#idOrigenMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
  
          } else if (finesEspecificos == element.idTipoCatalogo) {
  
            $('#idFinEspecificoMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
  
          } else {
            
            $('#idCondicionMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));
            
          }
          
        });
        // waitMeHide('#divBody');
  
      }).catch(function (error) {
        console.log('Hubo un problema con la petición Fetch:' + error.message);
      });
  }
  function getContraparte() {
    fetch('./api/institucionesApi.php', {
      method: "POST",
      body: JSON.stringify({ 'getInstituciones': { } }),
      dataType: "JSON"
    })
      .then(function (response) {
        return response.json();
      })
      .then(response => {
  
        $(response).each(function (index, element) {
            $('#idContraparteMd').append($('<option>').text(element.nombre).attr('value', element.idInstitucion));
          
        });
  
  
      }).catch(function (error) {
        console.log('Hubo un problema con la petición Fetch:' + error.message);
      });
  }
  function saveContrato() {
 
    let idContrato = $('#HFIdContrato').val() != '' ? $('#HFIdContrato').val() : '',
      params = {
        HFCommandName: $('#HFCommandName').val(),
        idContrato: idContrato,
        nombre: $('#txtNombre').val(),
        descripcion: $('#txtDescripcion').val(),
        fechaFirma: $('#fechaFirma').val(),
        isIndefinida: $('#chkIndefinida').is(':checked'),
        fechaFin: $('#fechaFin').val(),
        idFinEspecifico: $('#idFinEspecificoMd').val() == "" ? null : $('#idFinEspecificoMd').val(),
        idEstatus: $('#idCondicionMd').val() == "" ? null : $('#idCondicionMd').val(),
        idPrograma: $('#idProgramaMd').val() == "" ? null : $('#idProgramaMd').val(),
        idContraparte: $('#idContraparteMd').val()  == "" ? null : $('#idContraparteMd').val(),
        idAmbito: $('#idAmbitoMd').val() == "" ? null : $('#idAmbitoMd').val(),
        idOrigen: $('#idOrigenMd').val() == "" ? null : $('#idOrigenMd').val(),
        idTipoConvenio: $('#idTipoConvenioMd').val() == "" ? null : $('#idTipoConvenioMd').val(),
        idResponsable: $('#idResponsableMd').val() == "" ? null : $('#idResponsableMd').val(),
        financiamiento: $('#txtFinaciamiento').val(),
        idPais: $('#idPaisMd').val() == "" ? null : $('#idPaisMd').val(),
        isContratacionPersonal: $('#chkContraPersonal').is(':checked') == true ? 1 : 0 ,
        isVinculacionBecarios: $('#chkVinculaBeca').is(':checked') == true ? 1 : 0 ,
        isProductosEntregables: $('#chkProductEntrega').is(':checked') == true ? 1 : 0 ,
        isInformesFinancieros: $('#chkInfoFinan').is(':checked') == true ? 1 : 0 ,
        isInformesTecnicos: $('#chkInfoTecnicos').is(':checked') == true ? 1 : 0 ,
        isAuditoriaExterna: $('#chkAudiExterna').is(':checked') == true ? 1 : 0 ,
        encrypArchivo: $('#HFEncrypArchivo').val(),
        rutaArchivo: $('#HFRutaArchivo').val(),
        encrypFinanParcial: $('#HFEncrypFinanParcial').val(),
        rutaFinanParcial: $('#HFRutaFinanParcial').val(),
        encrypFinanFinal: $('#HFEcrypFinanFinal').val(),
        rutaFinanFinal: $('#HFRutaFinanFinal').val(),
        encrypTecnicoParcial: $('#HREncrypTecnicoParcial').val(),
        rutaTecnicoParcial: $('#HFRutaTecnicoParcial').val(),
        encrypTecnicoFinal: $('#HFEncrypTecnicoFinal').val(),
        rutaTecnicoFinal: $('#HFRutaTecnicoFinal').val(),
      };
    fetch('./api/contratosApi.php', {
      method: "POST",
      body: JSON.stringify({ 'saveContrato': params }),
      dataType: "JSON"
    })
      .then(response => {
        return response.json();
      })
      .then(response => {
        getContratos();
        $('#mdAltaEdicion').modal('hide');
        $('body').toast({
          class: 'success',
          message: `Contrato guardado correctamente !`
        });
      }).catch(error => {
        $('body').toast({ class: 'error', message: `An error occured !` + error.message });
  
      });
  
  }
  
  function loadData(data) {
    $.each(data, function (index, value) { 
    console.log(index);
    
       
    });
  
    const dateFirma = new Date(data.fechaFirma);
    const _fechaFirma = new Date(dateFirma.getFullYear(), dateFirma.getMonth(), dateFirma.getDate() + 1);
    // Getting required values
    // const year = today.getFullYear()
    // const month = today.getMonth()
    // const day = today.getDate()
    
    // Creating a new Date (with the delta)
    $('#HFCommandName').val('EDITAR');
    $('#HFIdContrato').val(data.idContrato);
    $('#txtNombre').val(data.nombre);
    $('#txtDescripcion').val(data.descripcion);
   
    // $('#divFechaFirma').calendar('set date',_fechaFirma.toDateString(), updateInput = true, fireChange = true);
    $('#idFinEspecificoMd').dropdown('set selected',data.idFinEspecifico);
    $('#idCondicionMd').dropdown('set selected',data.idEstatus);
    $('#idProgramaMd').dropdown('set selected',data.idPrograma);
    $('#idContraparteMd').val(2);
    $('#idAmbitoMd').dropdown('set selected',data.idAmbito);
    $('#idOrigenMd').dropdown('set selected',data.idOrigen);
    $('#idTipoConvenioMd').dropdown('set selected',data.idTipoConvenio);
    $('#txtFinaciamiento').val((data.financiamiento).replace(/[^0-9.-]+/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
    $('#idPaisMd').dropdown('set selected',data.idPais);
    $('#idResponsableMd').dropdown('set selected',data.idResponsable);
    if(data.rutaArchivo != ""){
      $('#aArchivoRef').attr("href", data.rutaArchivo); 
      $('#lblArchivoRef').text('Ver Archivo');
     } else {
       $('#aArchivoRef').attr("href", '#'); 
       $('#lblArchivoRef').text('No hay archivo') ;
    }
     if(data.rutaFinanParcial != ""){
       $('#aRefFinaParcial').attr("href", data.rutaFinanParcial);
       $('#lblRefFinParcial').text('Ver Archivo');
     } else {
       $('#aRefFinaParcial').attr("href", '#'); 
       $('#lblRefFinParcial').text('No hay archivo');
     }
     if(data.rutaFinanFinal != ""){
       $('#aRefFinFinal').attr("href", data.rutaFinanFinal);
       $('#lblRefFinFinal').text('Ver Archivo');
     } else {
       $('#aRefFinFinal').attr("href", '#'); 
       $('#lblRefFinFinal').text('No hay archivo');
     }
     if(data.rutaTecnicoParcial != ""){
       $('#aRefTecParcial').attr("href", data.rutaTecnicoParcial);
       $('#lblRefTecParcial').text('Ver Archivo');
     } else {
       $('#aRefTecParcial').attr("href", '#'); 
       $('#lblRefTecParcial').text('No hay archivo');
     }
     if(data.rutaTecnicoFinal != ""){
       $('#aRefTecFinal').attr("href", data.rutaTecnicoFinal);
       $('#lblRefTecFinal').text('Ver Archivo');
     } else {
       $('#aRefTecFinal').attr("href", '#'); 
       $('#lblRefTecFinal').text('No hay archivo');
     }
    
    

    if(data.isContratacionPersonal) { $('#chkContraPersonal').prop('checked', true); }
    if(data.isVinculacionBecarios) { $('#chkVinculaBeca').prop('checked', true); }
    if(data.isProductosEntregables) { $('#chkProductEntrega').prop('checked', true); }
    if(data.isInformesFinancieros) { $('#chkInfoFinan').prop('checked', true); }
    if(data.isInformesTecnicos) { $('#chkInfoTecnicos').prop('checked', true); }
    if(data.isAuditoriaExterna) {$('#chkAudiExterna').prop('checked', true); }
    if (data.isIndefinida) {
      $('#chkIndefinida').prop('checked', true);
    }
    if (data.fechaFirma != '') {
      $('#divFechaFirma').calendar('set date',_fechaFirma.toDateString(), updateInput = true, fireChange = true);
    }
    if (data.fechaFin !== '') {
      const dateFinal = new Date(data.fechaFin);
      const _fechaFin = new Date(dateFinal.getFullYear(), dateFinal.getMonth(), dateFinal.getDate() + 1);
      $('#divFechaFin').calendar('set date',_fechaFin.toDateString(), updateInput = true, fireChange = true);
    }   
  }
  
  function deleteContrato(idContrato) {
    $('#domtoastactions')
      .toast({
        displayTime: 0,
        onDeny: function () {
          // $('body').toast({message:'Wait not yet!'});
          // return false;
        },
        onApprove: function () {
          fetch('./api/contratosApi.php', {
            method: "POST",
            body: JSON.stringify({ 'deleteContrato': { idContrato: idContrato } }),
            dataType: "JSON"
          })
            .then(response => {
              return response.json();
            })
            .then(response => {
              getContratos();
              $('#mdAltaEdicion').modal('hide');
              $('body').toast({
                class: 'success',
                message: 'Contrato eliminado correctamente !'
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