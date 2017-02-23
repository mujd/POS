<?php
$app->get('/clienteContacto', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM clientecontacto;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/clienteContacto', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO clientecontacto (cliente_id, rut, nombre, cargo, celular, email) VALUES (:cliente_id, :rut, :nombre, :cargo, :celular, :email)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("cliente_id", $input['cliente_id']);
    $sth->bindParam("rut", $input['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("cargo", $input['cargo']);
    $sth->bindParam("celular", $input['celular']);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/clienteContacto/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE clientecontacto SET cliente_id = :cliente_id, rut = :rut, nombre = :nombre, cargo = :cargo, celular = :celular, email = :email WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("cliente_id", $input['cliente_id']);
    $sth->bindParam("rut", $input['rut']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->bindParam("cargo", $input['cargo']);
    $sth->bindParam("celular", $input['celular']);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/clienteContacto/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM clientecontacto WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});
