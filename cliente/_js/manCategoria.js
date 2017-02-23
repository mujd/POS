function categoriaCargarDetalle() { 
	$("#detalle").load("manCategoriaDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			categoriaRegistrar();
		});
	});
}

function categoriaCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manCategoriaListado.html #form", function() {
		var jsonCategoria = categoriaGet();
		for(var x = 0; x < jsonCategoria.length; x++) {
			$("#tabla").append("<tr><td>" + jsonCategoria[x].id + "</td><td>" + jsonCategoria[x].nombre + "</td></tr>")
		}
	});
}

function categoriaRegistrar() {
	categoriaPost($("#txtNombre").val());
	categoriaCargarListado();
}

function categoriaGet() {
    return apiGET(gURL + "/categoria");
}

function categoriaPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/categoria", info);
}