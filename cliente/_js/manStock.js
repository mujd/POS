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

function proveedorRegistrar() {
	proveedorPost($("#ddlArticulo").val(), $("#txtFecha").val(), $("#txtStock").val(), $("#txtCosto").val(), $("#txtVenta").val());
	proveedorCargarListado();
}

function stockGet() {
    return apiGET(gURL + "/stock");
}

function stockPost(articulo_id, fecha, stock, costo, venta) {
    var info = { 'articulo_id': articulo_id, 'fecha': fecha, 'stock': stock, 'costo': costo, 'venta': venta }
    return apiPOST(gURL + "/stock", info);
}