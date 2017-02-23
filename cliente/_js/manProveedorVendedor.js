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
			$("#tabla").append("<tr><td>" + jsonProveedorVendedor[x].id + "</td><td>" + jsonProveedorVendedor[x].cliente_id + "</td><td>" + jsonProveedorVendedor[x].rut + "</td><td>" + jsonProveedorVendedor[x].nombre + "</td><td>" + jsonProveedorVendedor[x].cargo + "</td><td>" + jsonProveedorVendedor[x].celular + "</td><td>" + jsonProveedorVendedor[x].email + "</td></tr>" )
		}
	});
}

function proveedorVendedorRegistrar() {
	proveedorVendedorPost($("#txtNombre").val());
	proveedorVendedorCargarListado();
}

function proveedorVendedorGet() {
    return apiGET(gURL + "/proveedorVendedor");
}

function proveedorVendedorPost(nombre) {
    var info = { 'nombre': nombre }
    return apiPOST(gURL + "/proveedorVendedor", info);
}