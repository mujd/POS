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
	clientePost($("#txtRut").val(), $("#txtNombre").val(), $("#txtGiro").val(), $("#txtDireccion").val(), $("#txtComuna").val(), $("#txtTelefono").val(), $("#txtEmail").val());
	clienteCargarListado();
}

function clienteGet() {
    return apiGET(gURL + "/cliente");
}

function clientePost(rut, nombre, giro, direccion, comuna, telefono, email) {
    var info = { 'rut': rut , 'nombre': nombre, 'giro': giro, 'direccion': direccion, 'comuna': comuna, 'telefono': telefono,'email': email}
    return apiPOST(gURL + "/cliente", info);
}
