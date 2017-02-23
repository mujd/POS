function unidadCargarDetalle() { 
	$("#detalle").load("manUnidadDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			unidadRegistrar();
		});
	});
}

function unidadCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manUnidadListado.html #form", function() {
		var jsonUnidad = unidadGet();
		for(var x = 0; x < jsonUnidad.length; x++) {
			$("#tabla").append("<tr><td>" + jsonUnidad[x].id + "</td><td>" + jsonUnidad[x].nombre + "</td></tr>")
		}
	});
}

function unidadRegistrar() {
	unidadPost($("#txtNombre").val());
	unidadCargarListado();
}

function unidadGet() {
    return apiGET(gURL + "/unidad");
}

function unidadPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/unidad", info);
}