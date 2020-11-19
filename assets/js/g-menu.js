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
    $aMenu = $('<a class="item" href=""></a>');
    
    if (flSubMenu.length > 0) {
      // let nombreMenu = flPadre.nombre, $id = nombreMenu,
      // $divP = $('<div id="'+ flPadre.modulo +'" class="ui dropdown item"></div>'),
      // $divS = $('<div class="menu"></div>');
      // $divP.append('<i class="dropdown icon"></i>');
      // $divP.text(nombreMenu);
      // // $aMenu.attr('href', 'index.php?ruta='+ flPadre.modulo +'').text(flPadre.nombre);
      // $divP.append($divS);
      // $(selector).append($divP);
      for (let val of flSubMenu) {
        $aSubMenu = $('<a class="item" href=""></a>');
        $aSubMenu.attr('href', 'index.php?ruta='+ val.modulo +'').text(val.nombre);
        $('#subMenuA').append($aSubMenu);
      }
    } else {
        $aMenu.attr('href', 'index.php?ruta='+ flPadre.modulo +'').text(flPadre.nombre);
        // aMenu = '<a class="item" href="index.php?ruta='+ flPadre.modulo +'" >'+ flPadre.nombre +'</a>';
    }
    // $(selector).append($aMenu);
    $aMenu.insertBefore('#perra');
    // $aMenu.empty();
    // $(aMenu).insertAfter('.right menu');
}
  /*      for (let val of flSubMenu) {
        $aMenu.attr('href', 'index.php?ruta='+ val.modulo +'').text(val.nombre);
        $('#subMenuA').append($aMenu);
        // crearSubMenu(menu, val, '#subMenuA');
      }
    } else {
        $aMenu.attr('href', 'index.php?ruta='+ flPadre.modulo +'').text(flPadre.nombre);
        // aMenu = '<a class="item" href="index.php?ruta='+ flPadre.modulo +'" >'+ flPadre.nombre +'</a>';
    }
    $aMenu.insertBefore('#perra');*/
function navActions() {
      // accionesMenu();
      // $('#divMenuA')
      //   .find($(`a[href='${$(location).attr('href') }'`))
      //   // .parents('div.collapse')
      //   // .addBack()
      //   .each(
      //     function () {
      //       $(this)
      //         // .collapse('show')
      //         .parent()
      //         .addClass('active')
      //         // .children('a')
      //         // .data('section');
      //     });
        //   $('#divMenuA a').click(function (e) {
        //     // e.preventDefault();
        //     $('a').removeClass('active');
        //     $(this).addClass('active');
        // });

//  $(`.nav-link[href="${location.pathname}"]`).parent().addClass("active");
$('#divMenuA a').click(function(e){
  // e.preventDefault();
     $('#divMenuA a').removeClass("active");
     $(this).addClass("active");
     
 });
}     