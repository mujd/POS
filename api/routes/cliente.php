<?php
$app->get('/cliente', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM cliente;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/cliente', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO cliente (rut, nombre, giro, direccion, comuna, telefono, email) VALUES (:rut, :nombre, :giro, :direccion, :comuna, :telefono, :email)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("rut", $input['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("giro", $input['giro']);
    $sth->bindParam("direccion", $input['direccion']);
    $sth->bindParam("comuna", $input['comuna']);
    $sth->bindParam("telefono", $input['telefono']);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/cliente/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE cliente SET rut = :rut, nombre = :nombre, giro = :giro, direccion = :direccion, comuna = :comuna, telefono = :telefono, email = :email WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("rut", $args['rut']);
    $sth->bindParam("nombre", $args['nombre']);
    $sth->bindParam("giro", $args['giro']);
    $sth->bindParam("direccion", $args['direccion']);
    $sth->bindParam("comuna", $args['comuna']);
    $sth->bindParam("telefono", $args['telefono']);
    $sth->bindParam("email", $args['email']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/cliente/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM cliente WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});
