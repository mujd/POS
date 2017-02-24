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
			$("#tabla").append("<tr><td>" + jsonArticulo[x].id + "</td><td>" + jsonArticulo[x].codigo + "</td><td>" + jsonArticulo[x].categoria_id + "</td><td>" + jsonArticulo[x].marca_id + "</td><td>" + jsonArticulo[x].descripcion + "</td><td>" + jsonArticulo[x].formato_id + "</td><td>" + jsonArticulo[x].cantidad + "</td><td>" + jsonArticulo[x].unidad_id + "</td><td>" + jsonArticulo[x].articulo + "</td><td>" + jsonArticulo[x].estado + "</td></tr>")
		}
	});
}

function articuloRegistrar() {
	articuloPost($("#txtCodigo").val(), $("#ddlCategoria").val(), $("#ddlMarca").val(), $("#txtDescripcion").val(), $("#ddlFormato").val(), $("#txtCantidad").val(), $("#ddlUnidad").val(), $("#txtArticulo").val(), $("#txtEstado").val());
	articuloCargarListado();
}

function articuloGet() {
    return apiGET(gURL + "/articulo");
}

function articuloPost(codigo, categoria_id, marca_id, descripcion, formato_id, cantidad, unidad_id, articulo, estado) {
    var info = { 'codigo': codigo , 'categoria_id':categoria_id, 'marca_id': marca_id, 'descripcion': descripcion, 'formato_id': formato_id, 'cantidad': cantidad,'unidad_id': unidad_id, 'articulo':articulo, 'estado':estado}
    return apiPOST(gURL + "/articulo", info);
}