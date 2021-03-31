$(function () {
    $('#formLogin').form({
        on: 'blur',
        fields: {
          // email: {
          //   identifier: 'name',
          //   rules: [
          //     {
          //       type: 'email',
          //       prompt: 'Please enter a value'
          //     }
          //   ]
          // },
          email:{
              identifier: 'username',
              rules:[{
                  type: 'email',
                  prompt: 'Ingresa un correo valido!'
              }]
          }
        },
        onSuccess: function () {
          // event.preventDefault();
          logIn();
          return false;
        }
      });
    
});

function logIn() {
     let params = {
        email: $('#txtEmail').val(),
        password: $('#txtPassword').val()
      };
    fetch('./api/usuariosApi.php', {
        method: "POST",
        body: JSON.stringify({ 'getLogin': params }),
        dataType: "JSON"
      })
        .then(function (response) {
          return response.json();
        })
        .then(response => {
          if (response.code) {
            throw new Error(response.message)
          }
          let datos =  response;
          console.log(datos);
          $('body').toast({
            class: 'success',
            message: 'Bienvenido ' + datos[0].nombre + '!'
          });
          // $('#HFSessionStart').val("OK");
          window.location = './?ruta=inicio';
            
    
    
        }).catch(e => {
          $('body').toast({
            class: 'error',
            message: e.message
          });
        });
}