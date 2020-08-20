$(function () {
      $('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  }).sidebar('attach events', '.item.pizzabars');

  $('.dropdown').dropdown({
  // you can use any ui transition
    transition: 'drop'
  });
  
});
function text_truncate(str, length, ending) {
  if (length == null) {
    length = 100;
  }
  if (ending == null) {
    ending = '';
  }
  if (str.length > length) {
    return str.substring(0, length - ending.length) + ending;
  } else {
    return str;
  }
};
function uploadFile(hfEncryp,hfRuta,lblResult) {
 

  this.add = function (e, data) {
      data.url = './api/loadFileApi.php';
      // $($(this).data('divresult')).html('');
      // $($(this).data('idprogress')).css('width', '0%');
      // $(this.idprogress).addClass('active');
      data.submit();
  };

  this.progressall = function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $($(this).data('idprogress')).progress({
        percent: progress
      });
      // $($(this).data('idprogress')).css(
      //     'width',
      //     progress + '%'
      // );
  };

  this.success = function (response, status, e, data) {
    let datos =  JSON.parse(response);
      $(this.idprogress).removeClass('active');
      $(hfEncryp).val(datos.encrypArchivo);
      $(hfRuta).val(datos.rutaArchivo)
      $(lblResult).text('Archivo subido correctamente');
      console.log(datos);
      
  };
  this.error = function(){ };

}
function cleanFile(idFile,ecrypFile,routeFile) {
  $($(idFile).data('idprogress')).progress();
  $($(idFile).data('idlblresult')).html('Ningun archivo seleccionado');
  $(ecrypFile).val();
  $(routeFile).val();

}

function waitMeShow(idForm) {
  $(idForm).waitMe(
  {
      effect: 'facebook',
      text: '...Cargando...',
      bg: 'rgba(255,255,255,0.7)',
      color: '#4B02DF',
      sizeW: '',
      sizeH: '',
      source: ''
  });
};

function waitMeHide(idForm) {
  $(idForm).waitMe('hide');
};


function test(params) {
  $('#fileupload').fileupload({
    url: '/Opciones/Helpers/FileUpload.ashx',
    acceptFileTypes: /(\.|\/)(jpe?g|png)$/i,
    previewMaxWidth: 100,
    previewMaxHeight: 100,
    success: function (response, status, e, data) {
      Toast.fire({
        type: 'success',
        title: "Imagen cargada correctamente."
      });
    },
    error: function (e, data) {
      Toast.fire({
        type: 'warning',
        title: "Error al cargar la imagen."
      });
      limpiaImagen();
    },
    done: function (e, data) {
      $('#imgEmpleado').prop('src', data.result);
      $('#imgEmpleado').data('image', 'profile');
      $('#imgEmpleado').height(127);
    },
    progressall: function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $('#progress .progress-bar').css(
        'width',
        progress + '%'
      );
    }
  });
  
  $('#btnClearFileupload').click(() => {
    limpiaImagen();
  });
  
  function limpiaImagen() {
    $('#imgEmpleado').prop('src', '/Images/anadir-empleado.png');
    $('#imgEmpleado').data('image', 'default');
  
    $('#progress .progress-bar').css(
      'width',
      0 + '%'
    );
  }
}