<?php
$app->get('/proveedor', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM proveedor;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/proveedor', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO proveedor (rut, nombre, direccion, comuna, telefono, email) VALUES (:rut, :nombre, :direccion, :comuna, :telefono, :email)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("rut", $input['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("direccion", $input['direccion']);
    $sth->bindParam("comuna", $input['comuna']);
    $sth->bindParam("telefono", $input['telefono']);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/proveedor/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE proveedor SET rut = :rut, nombre = :nombre, direccion = :direccion, comuna = :comuna, telefono = :telefono, email = :email WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("rut", $args['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("direccion", $args['direccion']);
    $sth->bindParam("comuna", $args['comuna']);
    $sth->bindParam("telefono", $args['telefono']);
    $sth->bindParam("email", $args['email']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/proveedor/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM proveedor WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});
