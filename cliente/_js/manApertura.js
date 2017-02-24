function aperturaCargarDetalle() { 
	$("#detalle").load("manAperturaDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			aperturaRegistrar();
		});
	});
}

function aperturaCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manAperturaListado.html #form", function() {
		var jsonApertura = aperturaGet();
		for(var x = 0; x < jsonApertura.length; x++) {
			$("#tabla").append("<tr><td>" + jsonApertura[x].id + "</td><td>" + jsonApertura[x].fecha + "</td><td>" + jsonApertura[x].usuario_id + "</td><td>" + jsonApertura[x].apertura + "</td></tr>" )
		}
	});
}

function aperturaRegistrar() {
	aperturaPost($("#txtFecha").val(), $("#ddlUsuario").val(), $("#txtApertura").val());
	aperturaCargarListado();
}

function aperturaGet() {
    return apiGET(gURL + "/apertura");
}

function aperturaPost(fecha, usuario_id, apertura) {
    var info = { 'fecha': fecha, 'usuario_id':usuario_id, 'apertura':apertura }
    return apiPOST(gURL + "/apertura", info);
}