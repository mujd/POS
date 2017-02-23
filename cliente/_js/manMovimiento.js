function movimientoCargarDetalle() { 
	$("#detalle").load("manMovimientoDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			movimientoRegistrar();
		});
	});
}

function movimientoCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manMovimientoListado.html #form", function() {
		var jsonMovimiento = movimientoGet();
		for(var x = 0; x < jsonMovimiento.length; x++) {
			$("#tabla").append("<tr><td>" + jsonMovimiento[x].id + "</td><td>" + jsonMovimiento[x].fecha + "</td><td>" + jsonMovimiento[x].usuario_id + "</td><td>" + jsonMovimiento[x].movimientoTipo_id + "</td><td>" + jsonMovimiento[x].articulo_id + "</td><td>" + jsonMovimiento[x].cantidad + "</td></tr>" )
		}
	});
}

function movimientoRegistrar() {
	movimientoPost($("#txtNombre").val());
	movimientoCargarListado();
}

function movimientoGet() {
    return apiGET(gURL + "/movimiento");
}

function movimientoPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/movimiento", info);
}