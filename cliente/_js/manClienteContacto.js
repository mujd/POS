function clienteContactoCargarDetalle() { 
	$("#detalle").load("manClienteContactoDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			clienteContactoRegistrar();
		});
	});
}

function clienteContactoCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manClienteContactoListado.html #form", function() {
		var jsonClienteContacto = clienteContactoGet();
		for(var x = 0; x < jsonClienteContacto.length; x++) {
			$("#tabla").append("<tr><td>" + jsonClienteContacto[x].id + "</td><td>" + jsonClienteContacto[x].cliente_id + "</td><td>" + jsonClienteContacto[x].rut + "</td><td>" + jsonClienteContacto[x].nombre + "</td><td>" + jsonClienteContacto[x].cargo + "</td><td>" + jsonClienteContacto[x].celular + "</td><td>" + jsonClienteContacto[x].email + "</td></tr>" )
		}
	});
}

function clienteContactoRegistrar() {
	clienteContactoPost($("#txtNombre").val());
	clienteContactoCargarListado();
}

function clienteContactoGet() {
    return apiGET(gURL + "/clienteContacto");
}

function clienteContactoPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/clienteContacto", info);
}