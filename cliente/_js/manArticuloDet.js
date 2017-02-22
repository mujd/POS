var gIP = "localhost"
var gPuerto = "8080";
var gURL = "http://" + gIP + ":" + gPuerto;

$.ajaxSetup({
    cache: false,
    async: false
});

$( document ).ready(function() {
	var jsonArticulo = apiGetArticulo();
	alert(jsonArticulo[0].articulo);
});

function apiGET(url) {
	try {
	    var retorno = null;
	    $.get(url, function(data) {
	        retorno = data;
	    }).fail(function(e) {
			alert(e); // or whatever
		});
	    return retorno;
	} catch(e) {
		alert("Error");
	}
}

function apiGetArticulo() {
    return apiGET(gURL + "/articulo");
}