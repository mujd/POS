<?php
$app->get('/marca', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM marca;");
	$sth->execute();
	$retorno = $sth->fetchAll();
	return $this->response->withJson($retorno);
});

$app->post('/marca', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO marca (nombre) VALUES (:nombre)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

$app->put('/marca/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    $sql = "UPDATE marca SET nombre = :nombre WHERE id = :id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("id", $args['id']);
    $sth->bindParam("nombre", $input['nombre']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});


$app->delete('/marca/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("DELETE FROM marca WHERE id = :id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $input['id'] = $args['id'];
    return $this->response->withJson($input);
});




