function formatoCargarDetalle() { 
	$("#detalle").load("manFormatoDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			formatoRegistrar();
		});
	});
}

function formatoCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manFormatoListado.html #form", function() {
		var jsonFormato = formatoGet();
		for(var x = 0; x < jsonFormato.length; x++) {
			$("#tabla").append("<tr><td>" + jsonFormato[x].id + "</td><td>" + jsonFormato[x].nombre + "</td></tr>")
		}
	});
}

function formatoRegistrar() {
	formatoPost($("#txtNombre").val());
	formatoCargarListado();
}

function formatoGet() {
    return apiGET(gURL + "/formato");
}

function formatoPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/formato", info);
}