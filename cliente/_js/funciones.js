var gIP = "localhost"
var gPuerto = "32000";
var gURL = "http://" + gIP + ":" + gPuerto;

$.ajaxSetup({
    cache: false,
    async: false
});

$(document).ready(function() {
	proveedorCargarDetalle();
	proveedorCargarListado();
	
	
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

function apiPOST(url, info) {
    var retorno = null;
    $.post(url, info, function(data) {
        retorno = data;
    });
    return retorno;
}
