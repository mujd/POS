function usuarioCargarDetalle() { 
	$("#detalle").load("manUsuarioDet.html #form", function() {
		$("#btnRegistrar").unbind("click");
		$("#btnRegistrar").click(function(){
			usuarioRegistrar();
			$("#txtNombres").val("");
			$("#txtApellidoPaterno").val("");
			$("#txtApellidoMaterno").val("");
			$("#txtCargo").val("");
			$("#txtLogin").val("");
			$("#txtPass").val("");
		});
	});
}

function usuarioCargarListado() {
	$("#tabla").remove("tr");
	$("#listado").load("manUsuarioListado.html #form", function() {
		var jsonUsuario = usuarioGet();
		for(var x = 0; x < jsonUsuario.length; x++) {
			$("#tabla").append("<tr><td>" + jsonUsuario[x].id + "</td><td>" + jsonUsuario[x].nombres + "</td><td>" + jsonUsuario[x].apellidoPaterno + "</td><td>" + jsonUsuario[x].apellidoMaterno + "</td><td>" + jsonUsuario[x].cargo + "</td><td>" + jsonUsuario[x].login + "</td><td>" + jsonUsuario[x].pass + "</td></tr>" )
		}
	});
}

function usuarioRegistrar() {
	usuarioPost($("#txtNombres").val(), $("#txtApellidoPaterno").val(), $("#txtApellidoMaterno").val(), $("#txtCargo").val(), $("#txtLogin").val(), $("#txtPass").val());
	usuarioCargarListado();
}

function usuarioGet() {
    return apiGET(gURL + "/usuario");
}

function usuarioPost(nombres, apellidoPaterno, apellidoMaterno, cargo, login, pass) {
    var info = { 'nombres': nombres, 'apellidoPaterno':apellidoPaterno, 'apellidoMaterno':apellidoPaterno, 'cargo':cargo, 'login':login, 'pass':pass }
    return apiPOST(gURL + "/usuario", info);
}