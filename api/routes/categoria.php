<?php
$app->get('/categoria', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM categoria;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/categoria', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO categoria (nombre) VALUES (:nombre)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/categoria/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE categoria SET nombre = :nombre WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/categoria/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM categoria WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




