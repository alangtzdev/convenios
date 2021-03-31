$(function () {
    getDatosConvenios();
    getDatosContratos();
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
            $('#totalConvenios').text(element.totalConvenios);
            $('#txtColaboracion').text(element.colaboracion);
            $('#txtMarco').text(element.marco);
            $('#txtEspecifico').text(element.especifico);
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
            $('#totalContratos').text(element.totalContratos);
            $('#txtPublico').text(element.publico);
            $('#txtPrivado').text(element.privado);
            $('#txtSocial').text(element.social);
        });
    }).catch(e=>{

    });
    
}