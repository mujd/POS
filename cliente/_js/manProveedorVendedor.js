function proveedorVendedorCargarDetalle() { 
	$("#detalle").load("manProveedorVendedorDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			proveedorVendedorRegistrar();
		});
	});
}

function proveedorVendedorCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manProveedorVendedorListado.html #form", function() {
		var jsonProveedorVendedor = proveedorVendedorGet();
		for(var x = 0; x < jsonProveedorVendedor.length; x++) {
			$("#tabla").append("<tr><td>" + jsonProveedorVendedor[x].id + "</td><td>" + jsonProveedorVendedor[x].proveedor_id + "</td><td>" + jsonProveedorVendedor[x].rut + "</td><td>" + jsonProveedorVendedor[x].nombre + "</td><td>" + jsonProveedorVendedor[x].cargo + "</td><td>" + jsonProveedorVendedor[x].celular + "</td><td>" + jsonProveedorVendedor[x].email + "</td></tr>" )
		}
	});
}

function proveedorVendedorRegistrar() {
	proveedorVendedorPost($("#ddlProveedor").val(), $("#txtRut").val(), $("#txtNombre").val(), $("#txtCelular").val(), $("#txtEmail").val());
	clienteCargarListado();
}

function proveedorVendedorGet() {
    return apiGET(gURL + "/proveedorVendedor");
}

function proveedorVendedorPost(proveedor_id, rut, nombre, celular, email) {
    var info = { 'proveedor_id': proveedor_id, 'rut':rut, 'nombre': nombre, 'celular':celular, 'email':email }
    return apiPOST(gURL + "/proveedorVendedor", info);
}