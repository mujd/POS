<?php
$app->get('/formato', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM formato;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/formato', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO formato (nombre) VALUES (:nombre)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/formato/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE formato SET nombre = :nombre WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/formato/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM formato WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




