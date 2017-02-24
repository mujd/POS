function proveedorCargarDetalle() { 
	$("#detalle").load("manProveedorDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			proveedorRegistrar();
		});
	});
}

function proveedorCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manProveedorListado.html #form", function() {
		var jsonProveedor = proveedorGet();
		for(var x = 0; x < jsonProveedor.length; x++) {
			$("#tabla").append("<tr><td>" + jsonProveedor[x].id + "</td><td>" + jsonProveedor[x].rut + "</td><td>" + jsonProveedor[x].nombre + "</td><td>" + jsonProveedor[x].direccion + "</td><td>" + jsonProveedor[x].comuna + "</td><td>" + jsonProveedor[x].telefono + "</td><td>" + jsonProveedor[x].email + "</td></tr>" )
		}
	});
}

function proveedorRegistrar() {
	proveedorPost($("#txtRut").val(), $("#txtNombre").val(), $("#txtDireccion").val(), $("#txtComuna").val(), $("#txtTelefono").val(), $("#txtEmail").val());
	proveedorCargarListado();
}

function proveedorGet() {
    return apiGET(gURL + "/proveedor");
}

function proveedorPost(rut, nombre, direccion, comuna, telefono, email) {
    var info = { 'rut': rut , 'nombre': nombre, 'direccion': direccion, 'comuna': comuna, 'telefono': telefono,'email': email}
    return apiPOST(gURL + "/proveedor", info);
}


