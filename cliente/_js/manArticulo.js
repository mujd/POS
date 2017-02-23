function articuloCargarDetalle() { 
	$("#detalle").load("manArticuloDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			articuloRegistrar();
		});
	});
}

function articuloCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manArticuloListado.html #form", function() {
		var jsonArticulo = articuloGet();
		for(var x = 0; x < jsonArticulo.length; x++) {
			$("#tabla").append("<tr><td>" + jsonArticulo[x].id + "</td><td>" + jsonArticulo[x].codigo + "</td><td>" + jsonArticulo[x].categoria + "</td><td>" + jsonArticulo[x].marca + "</td><td>" + jsonArticulo[x].descripcion + "</td><td>" + jsonArticulo[x].formato + "</td><td>" + jsonArticulo[x].cantidad + "</td><td>" + jsonArticulo[x].unidad + "</td><td>" + jsonArticulo[x].articulo + "</td><td>" + jsonArticulo[x].estado + "</td></tr>" )
		}
	});
}

function articuloRegistrar() {
	articuloPost($("#txtArticulo").val());
	articuloCargarListado();
}

function articuloGet() {
    return apiGET(gURL + "/articulo");
}

function articuloPost(articulo) {
    var info = { 'articulo': articulo }
    return apiPOST(gURL + "/articulo", info);
}