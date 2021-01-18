function accesoMenu(selector) {
  // waitMeShow(selector);
  let params = {
    // idUsuario: parseInt(Cookies.get('idUsuario')),
    idRol: parseInt(Cookies.get('idRol'))
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

      let menu_list = [];
      $.each(response, function (indexInArray, valueOfElement) {
        menu_list.push(valueOfElement);
      });
      console.log(menu_list);
      crearMenu(menu_list, selector);
      navActions();
    }).catch(e => {

    });

}
function crearMenu(menu, selector) {
  let flPadre = menu.filter(f => {
    return f.idModuloPa === 0;
  });
  for (let val of flPadre) {
    crearSubMenu(menu, val, selector);
  }
}
function crearSubMenu(menu, flPadre, selector) {
  let flSubMenu = menu.filter(f => { return f.idModuloPa === flPadre.idModulo; });
  let $aMenu = $('<a class="item acceso" href="ok"></a>');

  if (flSubMenu.length > 0) {

    for (let val of flSubMenu) {
     let $aSubMenu = $('<a class="item acceso" href=""></a>');
      $aSubMenu.attr('href', '?ruta=' + val.modulo + '').text(val.nombre).data("value", flPadre.idModulo_Rol);
      $('#subMenuA').append($aSubMenu);
    }
  } else {
    $aMenu.attr('href', '?ruta=' + flPadre.modulo + '').text(flPadre.nombre).data("value", flPadre.idModulo_Rol);
    $aMenu.insertBefore('#perra');
    // aMenu = '<a class="item" href="index.php?ruta='+ flPadre.modulo +'" >'+ flPadre.nombre +'</a>';
  }

}
function navActions() {
  // accionesMenu();
  var url = window.location.href;
  let ok = url.split('?')[1];
  let urlRegExp = new RegExp(ok.replace(/\/$/, '') + "$");
  $('a.acceso').each(function () {
    if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
      $(this).addClass('active');
      // alert($(this).data("value"));
      Cookies.set('idModulo_Rol', $(this).data('value'), { expires: 1});
      // crearAccion($(this).data("value"));
    }
  });
}     