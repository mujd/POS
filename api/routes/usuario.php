<?php
$app->get('/usuario', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM usuario;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/usuario', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO usuario (nombres, apellidoPaterno, apellidoMaterno, cargo, login, pass) VALUES (:rut, :nombres, :apellidoPaterno, :apellidoMaterno, :cargo, :login, :pass)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("nombres", $input['nombres']);
    $sth->bindParam("apellidoPaterno", $input['apellidoPaterno']);
    $sth->bindParam("apellidoMaterno", $input['apellidoMaterno']);
    $sth->bindParam("cargo", $input['cargo']);
    $sth->bindParam("login", $input['login']);
    $sth->bindParam("pass", $input['pass']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/usuario/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE usuario SET nombres = :nombres, apellidoPaterno = :apellidoPaterno, apellidoMaterno = :apellidoMaterno, cargo = :cargo, login = :login, pass = :pass WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("nombres", $input['nombres']);
    $sth->bindParam("apellidoPaterno", $input['apellidoPaterno']);
    $sth->bindParam("apellidoMaterno", $input['apellidoMaterno']);
    $sth->bindParam("cargo", $input['cargo']);
    $sth->bindParam("login", $input['login']);
    $sth->bindParam("pass", $input['pass']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/usuario/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM usuario WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});
