function clienteCargarDetalle() { 
	$("#detalle").load("manClienteDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			clienteRegistrar();
		});
	});
}

function clienteCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manClienteListado.html #form", function() {
		var jsonCliente = clienteGet();
		for(var x = 0; x < jsonCliente.length; x++) {
			$("#tabla").append("<tr><td>" + jsonCliente[x].id + "</td><td>" + jsonCliente[x].rut + "</td><td>" + jsonCliente[x].nombre + "</td><td>" + jsonCliente[x].giro + "</td><td>" + jsonCliente[x].direccion + "</td><td>" + jsonCliente[x].comuna + "</td><td>" + jsonCliente[x].telefono + "</td><td>" + jsonCliente[x].email + "</td></tr>" )
		}
	});
}

function clienteRegistrar() {
	clientePost($("#txtNombre").val());
	clienteCargarListado();
}

function clienteGet() {
    return apiGET(gURL + "/cliente");
}

function clientePost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/cliente", info);
}