function stockCargarDetalle() { 
	$("#detalle").load("manStockDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			stockRegistrar();
		});
	});
}

function stockCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manStockListado.html #form", function() {
		var jsonStock = stockGet();
		for(var x = 0; x < jsonStock.length; x++) {
			$("#tabla").append("<tr><td>" + jsonStock[x].id + "</td><td>" + jsonStock[x].articulo_id + "</td><td>" + jsonStock[x].fecha + "</td><td>" + jsonStock[x].stock + "</td><td>" + jsonStock[x].costo + "</td><td>" + jsonStock[x].venta + "</td></tr>" )
		}
	});
}

function stockRegistrar() {
	stockPost($("#txtNombre").val());
	stockCargarListado();
}

function stockGet() {
    return apiGET(gURL + "/stock");
}

function stockPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/stock", info);
}