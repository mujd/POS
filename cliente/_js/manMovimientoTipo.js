function movimientoTipoCargarDetalle() { 
	$("#detalle").load("manMovimientoTipoDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			movimientoTipoRegistrar();
		});
	});
}

function movimientoTipoCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manMovimientoTipoListado.html #form", function() {
		var jsonMovimientoTipo = movimientoTipoGet();
		for(var x = 0; x < jsonMovimientoTipo.length; x++) {
			$("#tabla").append("<tr><td>" + jsonMovimientoTipo[x].id + "</td><td>" + jsonMovimientoTipo[x].nombre + "</td><td>" + jsonMovimientoTipo[x].signo + "</td></tr>" )
		}
	});
}

function movimientoTipoRegistrar() {
	movimientoTipoPost($("#txtNombre").val(), $("#txtSigno").val());
	movimientoTipoCargarListado();
}

function movimientoTipoGet() {
    return apiGET(gURL + "/movimientoTipo");
}

function movimientoTipoPost(nombre, signo) {
    var info = { 'nombre': nombre, 'signo': signo}
    return apiPOST(gURL + "/movimientoTipo", info);
}