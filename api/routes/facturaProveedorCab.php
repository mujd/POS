<?php
$app->get('/facturaProveedorCab', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM facturaproveedorcab;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/facturaProveedorCab', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO facturaproveedorcab (fecha, usuario_id, proveedor_rut, proveedor_nombre, proveedor_direccion, proveedor_comuna, proveedor_telefono, proveedor_email, neto, iva, total) VALUES (:fecha, :usuario_id, :proveedor_rut, :proveedor_nombre, :proveedor_direccion, :proveedor_comuna, :proveedor_telefono, :proveedor_email, :neto, :iva, :total)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("proveedor_rut", $input['proveedor_rut']);
    $sth->bindParam("proveedor_nombre", $input['proveedor_nombre']);
    $sth->bindParam("proveedor_direccion", $input['proveedor_direccion']);
    $sth->bindParam("proveedor_comuna", $input['proveedor_comuna']);
    $sth->bindParam("proveedor_telefono", $input['proveedor_telefono']);
    $sth->bindParam("proveedor_email", $input['proveedor_email']);
    $sth->bindParam("neto", $input['neto']);
    $sth->bindParam("iva", $input['iva']);
    $sth->bindParam("total", $input['total']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/facturaProveedorCab/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE facturaproveedorcab SET fecha = :fecha, usuario_id = :usuario_id, proveedor_rut = :proveedor_rut, proveedor_nombre = :proveedor_nombre, proveedor_direccion = :proveedor_direccion, proveedor_comuna = :proveedor_comuna, proveedor_telefono = :proveedor_telefono, proveedor_email = :proveedor_email, neto = :neto, iva = :iva, total = :total WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("fecha", $input['fecha']);
    $sth->bindParam("usuario_id", $input['usuario_id']);
    $sth->bindParam("proveedor_rut", $input['proveedor_rut']);
    $sth->bindParam("proveedor_nombre", $input['proveedor_nombre']);
    $sth->bindParam("proveedor_direccion", $input['proveedor_direccion']);
    $sth->bindParam("proveedor_comuna", $input['proveedor_comuna']);
    $sth->bindParam("proveedor_telefono", $input['proveedor_telefono']);
    $sth->bindParam("proveedor_email", $input['proveedor_email']);
    $sth->bindParam("neto", $input['neto']);
    $sth->bindParam("iva", $input['iva']);
    $sth->bindParam("total", $input['total']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/facturaProveedorCab/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM facturaproveedorcab WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




