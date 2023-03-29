$(function() {
    getConvenios();
    getCatalogos();
    getPaises();
    getResponsables();
    getContraparte();
    let idModulo_Rol = parseInt(Cookies.get('idModulo_Rol'));

    // getResponsables();
    //   $('#example5').progress();
    //   $('#aver')
    //   .on('click', function() {
    //     var
    //       $progress       = $('indicating progress.ui.progress'),
    //       $button         = $(this),
    //       updateEvent
    //     ;
    //     // restart to zero
    //     clearInterval(window.fakeProgress)
    //     $progress.progress('reset');
    //      // updates every 10ms until complete
    //     window.fakeProgress = setInterval(function() {
    //       $progress.progress('increment');
    //       $button.text( $progress.progress('get value') );
    //       // stop incrementing when complete
    //       if($progress.progress('is complete')) {
    //         clearInterval(window.fakeProgress)
    //       }
    //     }, 10);
    //   })
    // ;
    $("#txtFinaciamiento").on({
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/[^0-9.-]+/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
            });
        }
    });
    // $('#txtFinaciamiento').on('change', function() {
    //   this.value = maskDinero(unmaskDinero(this.value));
    // });

    $('#archivoResult').progress();
    $('#tableConvenios tbody').on('click', '#linkConvenio', function() {
        var table = $('#tableConvenios').DataTable();
        var data = table.row($(this).parents('tr')).data();
        mdAltaEdicion($(this).data('command'));
        loadData(data, $(this).data('command'));
    });

    $('#tableConvenios tbody').on('click', '#btnEditar', function() {
        var table = $('#tableConvenios').DataTable();
        var data = table.row($(this).parents('tr')).data();
        mdAltaEdicion($(this).data('command'));
        loadData(data, $(this).data('command'));
    });


    $('#btnNuevo').click(function() {
        mdAltaEdicion($(this).data('command'));
    });

    $('#formConvenios').form({
        on: 'blur',
        fields: {
            empty: {
                identifier: 'name',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter a value'
                }]
            }
        },
        onSuccess: function() {
            // event.preventDefault();
            saveConvenio();
            return false;
        }
    });

    $('#chkIndefinida').on('change', function() {
        if ($('#chkIndefinida').is(':checked')) {
            $('#divFechaFin :input').attr('disabled', true);
        } else {
            $('#divFechaFin :input').attr('disabled', false);
        }
    });

    $('#divFechaFin :input').attr('disabled', false);


    // $('#idArchivo').fileupload({
    //   url: './api/loadFileApi.php?file=' + $(this).data('file'),
    //   acceptFileTypes: /(\.|\/)(jpe?g|png)$/i,
    //   previewMaxWidth: 100,
    //   previewMaxHeight: 100,
    //   success: function(response, status, e, data) {
    //     Toast.fire({
    //       type: 'success',
    //       title: "Imagen cargada correctamente."
    //     });
    //   },
    //   error: function(e, data) {
    //     Toast.fire({
    //       type: 'warning',
    //       title: "Error al cargar la imagen."
    //     });
    //     limpiaImagen();
    //   },
    //   done: function(e, data) {
    //     $('#imgEmpleado').prop('src', data.result);
    //     $('#imgEmpleado').data('image', 'profile');
    //     $('#imgEmpleado').height(127);
    //   },
    //   progressall: function(e, data) {
    //     var progress = parseInt(data.loaded / data.total * 100, 10);
    //     // var progress = parseInt(data.loaded / data.total * 100, 10);
    //     $($(this).data('idprogress')).progress({
    //       percent: progress
    //     });
    //   }
    // });
    $('#tableConvenios').on('page.dt', function() {
        crearAcciones($('#divMenuA').find(".active").data("value"));
    });
    $('#tableConvenios').on('search.dt', function() {
        crearAcciones($('#divMenuA').find(".active").data("value"));
    });

});

function unmaskDinero(numeroString) {
    return +(numeroString.replace(/[^0-9.-]+/g, ""));
}

function maskDinero(numeroInt) {
    return "$" + parseFloat(numeroInt).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}

function mdAltaEdicion(command) {
    $('#mdAltaEdicion')
        .modal({
            closable: false,
            onShow: function() {
                $('#divFechaFirma').calendar({
                    type: 'date',
                    startMode: 'year',
                    //   formatter: {
                    //     date: function(date, settings) {
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
                $('#btnGuardar').show();
                $('#divArchivoConsul').hide();
                $('#divArchivoNuevo').show();
                $('#HFCommandName').val(command);
                $('#idResponsableMd').dropdown({
                    ignoreDiacritics: true,
                    sortSelect: true,
                    fullTextSearch: 'exact'
                });

                $('#txtTitle').text('ALTA');
                if (command == 'CONSULTA') {
                    $('#divArchivoConsul').show();
                    $('#divArchivoNuevo').hide();
                    $('#txtTitle').text('CONSULTA');
                    $('#btnGuardar').hide();
                    $('#idArchivo').attr('disable', true);
                    //   $("#mdAltaEdicion .dropdown").each(function(index) {
                    //     $(this).attr('disabled', true); 
                    // });
                    $('.ui.dropdown.selection').addClass('disabled');
                    $('.ui.calendar :input').attr('disabled', true);
                    $("#mdAltaEdicion :input").each(function(index) {
                        $(this).attr('disabled', true);

                        // $(this).parent('div').removeClass('has-error');
                        // $('span.help-block-error').remove();
                        // $('div.progress').hide();
                        // $(this).parent('div').removeClass('progress');
                        // $('#dateCaducidadCirculacion').prop('disabled');
                        //limpiaCamposArchivos();
                    });
                    // $('#cboTipoUnidad').prop('disabled', true);
                    // $('#btnGuardar').hide();
                    // $("span.fileinput-button").hide();
                    // //$('a.btn-warning').show();
                    // $('#divBody a').show();
                    // $('#RdioSi, #RdioNo').iCheck('disable');
                } else if (command == 'EDITAR') {
                    $('#txtTitle').text('EDITAR');

                }


                // var button = $(event.relatedTarget)
                // var isdisabled = (button.data('command') == "CONSULTA");
                // var isEdit = (button.data('command') == "EDITAR");
                // if (event.target.tagName != "INPUT") {
                //     $('#HFCommandName').val(button.data('command'));

                // }
                // $("#mdAltaEdicion :input").each(function(index) {
                //     $(this).attr('disabled', isdisabled);
                //     $(this).parent('div').removeClass('has-error');
                //     $('span.help-block-error').remove();
                //     $('div.progress').hide();
                //     $(this).parent('div').removeClass('progress');
                //     $('#dateCaducidadCirculacion').prop('disabled', isdisabled);
                //     //limpiaCamposArchivos();
                // });

                // if (isdisabled) {

                // }
                // else {
                //     $('#btnGuardar').show();
                //     $("span.fileinput-button").show();
                //     $('#RdioSi, #RdioNo').iCheck('enable');

                //     $('#cboTipoUnidad').prop('disabled', false);
                //     $('div.progress').show();
                //     $('#divBody a').hide();
                // }
                // if (isdisabled || isEdit) {
                //     $('#divBody a').show();
                // }

            },
            onHide: function() {
                cleanFile($('#idArchivo'), $('#HFEncrypArchivo'), $('#HFRutaArchivo'));
                $('#HFIdConvenio').val('');
                //Resets form input fieldsz
                // $('.ui.form').trigger("reset");
                $('.ui.form').form('reset');
                //Resets form error messages
                $('.ui.form .field.error').removeClass("error");
                $('.ui.form.error').removeClass("error");
                $('.ui.form :input').attr('disabled', false);
                $('.ui.dropdown.selection').removeClass('disabled');
                $('.ui.calendar :input').attr('disabled', false);
            },
            onApprove: function() {
                $('.ui.form').form('submit');
                return false;
            }
        }).modal('show');
}

function subir(id) {
    var file = document.getElementById(id);
    file.dispatchEvent(new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    }));
    $('#idArchivo').fileupload(new uploadFile('#HFEncrypArchivo', '#HFRutaArchivo', '#glosaArchivos'));

}

function getConvenios() {
    waitMeShow('#idDivBody');
    var params = { idUsuario: 1 };
    let idModulo_Rol = $('#divMenuA').find(".active").data("value");
    $.ajax({
        type: "POST",
        url: "./api/conveniosApi.php",
        data: { "getConvenios": params },
        dataType: "json",
        success: function(response) {
            var table = $('#tableConvenios').DataTable();
            table.destroy();
            let arrColor = { 'General': 'orange', 'Específico': 'olive', 'Contrato': 'teal', 'Marco': 'violet', 'Colaboración': 'pink', 'Uso de Espacios': 'brown' };
            $('#tableConvenios').DataTable({
                language: { "url": "./assets/plugins/datatable/Spanish.json" },
                data: response,
                
                buttons: ['excelHtml5'],
                columnDefs: [
                    { "bSortable": false, "aTargets": [5, 6, 7] },
                    {
                        className: "dt-center",
                        "targets": "_all"
                    }
                ],
                columns: [{
                    data: "nombre",
                    mRender: function(data, type, full) {
                        return '<a type="button" id="linkConvenio"  href="#" data-command="CONSULTA" /><strong>' + data + '</strong></a>';
                    }


                },
                {
                    data: "contraparte",
                    mRender: function(data, type, full) {
                        return '<div class="ui label"><i class="school icon"></i>' + data + '</div>'
                    }
                },
                {
                    data: "fechaFirma"
                },
                {
                    mRender: function(data, type, full) {
                        return full.isIndefinida == 0 ? full.fechaFin : "Indefinida";
                    }
                },
                {
                    data: "tipoConvenio",
                    mRender: function(data, type, full) {
                        return '<label class="ui ' + arrColor[full.tipoConvenio] + ' tag label"><strong>' + data + '</strong></label>';
                    }
                },
                // {
                //   mRender: function(data, type, full) {
                //     return ((full.financiamiento).replace(/[^0-9.-]+/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                //   }
                // },
                {
                    mRender: function(data, type, full) {
                        // (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '"/><strong> ' + data + '</strong></a>' : '<label><strong> ' + data + '</strong></label>');
                        return (full.rutaArchivo != "" ? '<a target="_blank"  href="' + full.rutaArchivo + '" type="button" class="ui teal icon button"/><i class="fa fa-file"></i></a>' : 'Sin archivo');
                    },
                    width: "8%",
                },
                {
                    mRender: function(data, type, full) {
                        return "<button id='btnEditar' type='button' class='ui violet icon button btnEditar' data-command='EDITAR' disabled/><i class='fa fa-pencil-alt'></i></button>";
                    },
                    width: "8%",
                },
                {
                    mRender: function(data, type, full) {
                        return '<button id="btnEliminar" data-toggle="tooltip" data-placement="left" title="Eliminar" type="button" class="ui red icon button btnEliminar" onclick="deleteConvenio(' + full.idConvenio + ')" disabled/><i class="fa fa-trash"></i></button>';
                    },
                    width: "8%",
                }
                ]
            });
            waitMeHide('#idDivBody');
            //crearAcciones();
        },
        error: function(data) {
            waitMeHide('#iDivBody');
            var dataError = data.responseText;
            // swal("Cancelled", dataError + " !", "error");
        }
    });

    crearAcciones(idModulo_Rol);
}

function getCatalogos() {
    fetch('./api/catalogosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getCatalogos': { id: 1 } }),
        dataType: "JSON"
    })
        .then(function(response) {
            return response.json();
        })
        .then(response => {
            let ambito = 1,
                programa = 2,
                convenio = 3,
                origen = 4,
                finesEspecificos = 5;

            $(response).each(function(index, element) {

                if (ambito == element.idTipoCatalogo) {

                    $('#idAmbitoMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

                } else if (programa == element.idTipoCatalogo) {

                    $('#idProgramaMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

                } else if (convenio == element.idTipoCatalogo) {

                    $('#idTipoConvenioMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

                } else if (origen == element.idTipoCatalogo) {

                    $('#idOrigenMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

                } else if (finesEspecificos == element.idTipoCatalogo) {

                    $('#idFinEspecificoMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

                } else {

                    $('#idCondicionMd').append($('<option>').text(element.nombre).attr('value', element.idCatalogo));

                }
            });
            // waitMeHide('#divBody');

        }).catch(function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}

function getSubCatalogos(idArea, search, md) {
    let params = { idArea: idArea };
    $.ajax({
        type: "POST",
        url: "../controllers/archivosController.php",
        data: { "getCategoriasArea": params },
        dataType: "json",
        success: function(response) {
            let $slc = '';
            let $idCategoria = '';
            let $divCategoria = '';
            let $lbl = '';
            if (search == true) {
                $slc = $('<select id="idCategoria" class="form-control select2 select2-hidden-accessible" tabindex="-1 aria-hidden="true"></select>');
                $idCategoria = '#idCategoria';
                $divCategoria = '#divCategoria';
                $lbl = $('<label class="control-label">Categoria</label>');
            } else {
                $slc = $('<select id="idCategoriaMd" class="form-control"></select>');
                $idCategoria = '#idCategoriaMd';
                $divCategoria = '#divCategoriaMd';
                $lbl = $('<label for="idCategoriaMd">Selecciona una Categoria</label>');
            }
            $(response).each(function(index, element) {
                $($slc).append('<option></option><option value="' + element.id + '"> ' + element.nombreCategoria + '</option>');
            });
            $($divCategoria).html('').append($slc);
            search == true ? $($slc).before($lbl) : $($slc).after($lbl);
            $($slc).trigger('change');
            // $($slc).trigger('create');
            $("#idCategoria").select2({
                placeholder: "Selecciona una catergoria..",
                width: null
            });
        }
    });
}

function getPaises() {
    fetch('./api/paisesApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getPaises': { id: 1 } }),
        dataType: "JSON"
    })
        .then(function(response) {
            return response.json();
        })
        .then(response => {
            // let datos =  JSON.parse(response);

            $(response).each(function(index, element) {
                // $('#idPaisMD').addClass('fluid search');
                $('#idPaisMd').append($('<option>').text(element.nombre).attr('value', element.idPais));

            });


        }).catch(function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}

function getResponsables() {
    fetch('./api/usuariosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getUsuarios': { id: 1 } }),
        dataType: "JSON"
    })
        .then(function(response) {
            return response.json();
        })
        .then(response => {

            $(response).each(function(index, element) {

                $('#idResponsableMd').append($('<option>').text(element.nombre + ' ' + element.apellido).attr('value', element.idUsuario));

            });


        }).catch(function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}

function getContraparte() {
    fetch('./api/institucionesApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getInstituciones': {} }),
        dataType: "JSON"
    })
        .then(function(response) {
            return response.json();
        })
        .then(response => {

            $(response).each(function(index, element) {
                $('#idContraparteMd').append($('<option>').text(element.nombre).attr('value', element.idInstitucion));

            });


        }).catch(function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
}

function saveConvenio() {

    let idConvenio = $('#HFIdConvenio').val() != '' ? $('#HFIdConvenio').val() : '';
    params = {
        HFCommandName: $('#HFCommandName').val(),
        idConvenio: idConvenio,
        nombre: $('#txtNombre').val(),
        descripcion: $('#txtDescripcion').val(),
        fechaFirma: $('#fechaFirma').val(),
        isIndefinida: $('#chkIndefinida').is(':checked'),
        fechaFin: $('#fechaFin').val(),
        idFinEspecifico: $('#idFinEspecificoMd').val() == "" ? null : $('#idFinEspecificoMd').val(),
        idEstatus: $('#idCondicionMd').val() == "" ? null : $('#idCondicionMd').val(),
        idPrograma: $('#idProgramaMd').val() == "" ? null : $('#idProgramaMd').val(),
        idContraparte: $('#idContraparteMd').val() == "" ? null : $('#idContraparteMd').val(),
        idAmbito: $('#idAmbitoMd').val() == "" ? null : $('#idAmbitoMd').val(),
        idOrigen: $('#idOrigenMd').val() == "" ? null : $('#idOrigenMd').val(),
        idTipoConvenio: $('#idTipoConvenioMd').val() == "" ? null : $('#idTipoConvenioMd').val(),
        idResponsable: $('#idResponsableMd').val() == "" ? null : $('#idResponsableMd').val(),
        financiamiento: ($('#txtFinaciamiento').val()).replace(/,/g, ""),
        idPais: $('#idPaisMd').val() == "" ? null : $('#idPaisMd').val(),
        isIntercambioEstudiantes: $('#chkInterEst').is(':checked') == true ? 1 : 0,
        isIntercambioProfesores: $('#chkInterProfe').is(':checked') == true ? 1 : 0,
        isAccesoBiblioteca: $('#chkAccessBiblio').is(':checked') == true ? 1 : 0,
        isEstServicioSocial: $('#chkSerSocial').is(':checked') == true ? 1 : 0,
        isDesarrolloProyectos: $('#chkDesProy').is(':checked') == true ? 1 : 0,
        isCoedicionLibros: $('#chkCoeLibros').is(':checked') == true ? 1 : 0,
        isCostosInstitucionales: $('#chkCostosInst').is(':checked') == true ? 1 : 0,
        isInformeAvance: $('#chkInformesAvance').is(':checked') == true ? 1 : 0,
        encrypArchivo: $('#HFEncrypArchivo').val(),
        rutaArchivo: $('#HFRutaArchivo').val()
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
    // $('#HFCommandName').val('EDITAR');
    $('#HFIdConvenio').val(data.idConvenio);
    $('#txtNombre').val(data.nombre);
    $('#txtDescripcion').val(data.descripcion);
    // $('#divFechaFirma').calendar('set date',_fechaFirma.toDateString(), updateInput = true, fireChange = true);
    $('#idFinEspecificoMd').dropdown('set selected', data.idFinEspecifico);
    $('#idCondicionMd').dropdown('set selected', data.idEstatus);
    $('#idProgramaMd').dropdown('set selected', data.idPrograma);
    $('#idContraparteMd').dropdown('set selected', data.idContraparte);
    $('#idAmbitoMd').dropdown('set selected', data.idAmbito);
    $('#idOrigenMd').dropdown('set selected', data.idOrigen);
    $('#idTipoConvenioMd').dropdown('set selected', data.idTipoConvenio);
    $('#txtFinaciamiento').val((data.financiamiento).replace(/[^0-9.-]+/g, "")
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
    $('#idPaisMd').dropdown('set selected', data.idPais);
    $('#idResponsableMd').dropdown('set selected', data.idResponsable);
    if (data.rutaArchivo != "") {
        $('#aArchivoRef').attr("href", data.rutaArchivo);
        $('#lblArchivoRef').text('Ver Archivo');
    } else {
        $('#aArchivoRef').attr("href", '#');
        $('#lblArchivoRef').text('No hay archivo');
    }

    if (data.isIntercambioEstudiantes) { $('#chkInterEst').prop('checked', true); }
    if (data.isIntercambioProfesores) { $('#chkInterProfe').prop('checked', true); }
    if (data.isAccesoBiblioteca) { $('#chkAccessBiblio').prop('checked', true); }
    if (data.isEstServicioSocial) { $('#chkSerSocial').prop('checked', true); }
    if (data.isDesarrolloProyectos) { $('#chkDesProy').prop('checked', true); }
    if (data.isCoedicionLibros) { $('#chkCoeLibros').prop('checked', true); }
    if (data.isCostosInstitucionales) { $('#chkCostosInst').prop('checked', true); }
    if (data.isInformeAvance) { $('#chkInformesAvance').prop('checked', true); }
    if (data.isIndefinida) {
        $('#chkIndefinida').prop('checked', true);
    }
    if (data.fechaFirma != '') {
        $('#divFechaFirma').calendar('set date', _fechaFirma.toDateString(), updateInput = true, fireChange = true);
    }
    if (data.fechaFin !== '') {
        const dateFinal = new Date(data.fechaFin);
        const _fechaFin = new Date(dateFinal.getFullYear(), dateFinal.getMonth(), dateFinal.getDate() + 1);
        $('#divFechaFin').calendar('set date', _fechaFin.toDateString(), updateInput = true, fireChange = true);
    }
    if ($('#HFCommandName').val() == "EDITAR" && data.encrypArchivo !== "") {
        $('#HFEncrypArchivo').val(data.encrypArchivo),
            $('#HFRutaArchivo').val(data.rutaArchivo)
    }
    // $('#formConvenios :input")').addClass("edited");
}

function deleteConvenio(idConvenio) {
    $('#domtoastactions')
        .toast({
            displayTime: 0,
            onDeny: function() {
                // $('body').toast({message:'Wait not yet!'});
                // return false;
            },
            onApprove: function() {
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