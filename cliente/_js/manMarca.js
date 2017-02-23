function marcaCargarDetalle() { 
	$("#detalle").load("manMarcaDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			marcaRegistrar();
		});
	});
}

function marcaCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manMarcaListado.html #form", function() {
		var jsonMarca = marcaGet();
		for(var x = 0; x < jsonMarca.length; x++) {
			$("#tabla").append("<tr><td>" + jsonMarca[x].id + "</td><td>" + jsonMarca[x].nombre + "</td></tr>")
		}
	});
}

function marcaRegistrar() {
	marcaPost($("#txtNombre").val());
	marcaCargarListado();
}

function marcaGet() {
    return apiGET(gURL + "/marca");
}

function marcaPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/marca", info);
}