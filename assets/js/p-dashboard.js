$(function () {
    getDatosConvenios();
    getDatosContratos();
    $('.inicioMd')
  .modal('show')
;
});
function getDatosConvenios() {
    fetch('./api/dashboardApi.php',{
        method: "POST",
        body: JSON.stringify({getDatosConvenios: {}}),
        dataType: "JSON"
    }).then(response =>{
        return response.json();
    }).then(response =>{
        $.each(response, function (indexInArray, element) {  
            $('#totalConvenios').text(element.totalConvenios + " Convenios");
            $('#txtColaboracion').text(element.colaboracion + " Colaboración");
            $('#txtMarco').text(element.marco + " Marco");
            $('#txtEspecifico').text(element.especifico + " Especifico");
        });
    }).catch(e=>{

    });
}
function getDatosContratos() {
    fetch('./api/dashboardApi.php',{
        method: "POST",
        body: JSON.stringify({getDatosContratos: {}}),
        dataType: "JSON"
    }).then(response =>{
        return response.json();
    }).then(response =>{
        $.each(response, function (indexInArray, element) {  
            $('#totalContratos').text(element.totalContratos + " Financiados");
            $('#txtPublico').text(element.publico + " Publico");
            $('#txtPrivado').text(element.privado + " Privado");
            $('#txtSocial').text(element.social + " Sociale");
        });
    }).catch(e=>{

    });
    
}