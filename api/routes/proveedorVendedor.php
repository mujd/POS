<?php
$app->get('/proveedorVendedor', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM proveedorvendedor;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/proveedorVendedor', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO proveedorvendedor (proveedor_id, rut, nombre, celular, email) VALUES (:proveedor_id, :rut, :nombre, :celular, :email)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("proveedor_id", $input['proveedor_id']);
    $sth->bindParam("rut", $input['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("celular", $input['celular']);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/proveedorVendedor/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE proveedorvendedor SET proveedor_id = :proveedor_id, rut = :rut, nombre = :nombre, celular = :celular, email = :email WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("proveedor_id", $args['proveedor_id']);
    $sth->bindParam("rut", $args['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("celular", $args['celular']);
    $sth->bindParam("email", $args['email']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/proveedorVendedor/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM proveedorvendedor WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});
